const path = require('path');
const fs = require('fs');

// Läs alla mappar under "blocks" och skapa entry-punkter
const blocksDir = path.resolve(__dirname, 'blocks');
const blockDirs = fs.readdirSync(blocksDir).filter((dir) => fs.statSync(path.join(blocksDir, dir)).isDirectory());

// Skapa entry och output dynamiskt
const entry = {};
const output = {};

blockDirs.forEach((block) => {
  entry[block] = path.resolve(blocksDir, block, 'src', 'index.js');
  output[block] = {
    path: path.resolve(blocksDir, block, 'build'),
    filename: 'index.js',
  };
});

module.exports = {
  entry: entry,
  output: {
    path: path.resolve(__dirname, 'blocks'), // Grundläggande output path
    filename: '[name]/build/index.js', // Dynamisk filväg för varje block
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env', '@babel/preset-react']
          }
        }
      }
    ]
  }
};  