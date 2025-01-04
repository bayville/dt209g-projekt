// Imports
const { registerBlockType } = wp.blocks;
const { useState, useEffect } = wp.element;
const { SelectControl, Spinner } = wp.components;
const { RichText } = wp.blockEditor;

// Register block type
registerBlockType('gefle-workspace/hello-world', {
    title: 'CTA Block',
    icon: 'megaphone',
    category: 'design',
    
    attributes: {
        selectedPostId: {
            type: 'number',
            default: null
        },
        ctaText: {
            type: 'string',
            default: ''
        },
        ctaBtnText: {
            type: 'string',
            default: ''
        },
        ctaBtnLink: {
            type: 'string',
            default: ''
        }
    },

    edit: ({ attributes, setAttributes }) => {
        const { selectedPostId, ctaText, ctaBtnText, ctaBtnLink } = attributes;
        const [posts, setPosts] = useState([]);
        const [loading, setLoading] = useState(true);
    
        // Fetch posts from custom post type "cta"
        useEffect(() => {
            wp.apiFetch({ path: '/wp/v2/cta' })
                .then((fetchedPosts) => {
                    console.log("Fetchedposts", fetchedPosts);
                    setPosts(fetchedPosts);
                    setLoading(false);
                })
                .catch(() => {
                    setPosts([]);
                    setLoading(false);
                });
        }, []);
    
        // Handle select change
        const handlePostChange = (postId) => {
            const selectedPost = posts.find(post => post.id === parseInt(postId));
            
            if (selectedPost) {
                setAttributes({
                    selectedPostId: parseInt(postId),
                    ctaText: selectedPost.meta.cta_text,
                    ctaBtnText: selectedPost.meta.cta_btn_text,
                    ctaBtnLink: selectedPost.meta.cta_btn_link
                });
            } else {
                // Reset attributes if no post is selected
                setAttributes({
                    selectedPostId: null,
                    ctaText: '',
                    ctaBtnText: '',
                    ctaBtnLink: ''
                });
            }
        };
        // Render block in editor
        return (
            <div className="cta-block-editor">
                {loading ? (
                    <Spinner />
                ) : (
                    <SelectControl
                        label="Välj ett CTA-inlägg"
                        value={selectedPostId}
                        options={[{ label: 'Välj ett inlägg', value: '' }, ...posts.map((post) => ({
                            label: post.title.rendered,
                            value: post.id
                        }))]}
                        onChange={handlePostChange}
                    />
                )}
            </div>
        );
    },
    
    // Save block to database
    save: ({ attributes }) => {
        const { selectedPostId, ctaText, ctaBtnText, ctaBtnLink } = attributes;

        return (
            <div className="cta-block">
                <div className="cta-content" data-post-id={selectedPostId}>
                    {ctaText && <p>{ctaText}</p>}
                    {ctaBtnText && ctaBtnLink && (
                        <a href={ctaBtnLink} className="btn bg-primary">
                            {ctaBtnText}
                        </a>
                    )}
                </div>
            </div>
        );
    }
});
