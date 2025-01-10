/**
 * Locks post type if reqirements are not met
 * Source: https://bdwm.be/gutenberg-how-to-prevent-post-from-being-saved/
 */

// Save locks
const locks = [];

function lock( lockIt, handle, message ) {
  if ( lockIt ) {
    if ( ! locks[ handle ] ) {
      locks[ handle ] = true;
      wp.data.dispatch( 'core/editor' ).lockPostSaving( handle );
      wp.data.dispatch( 'core/notices' ).createNotice(
        'error',
        message,
        { id: handle, isDismissible: false }
      );
    }
  } else if ( locks[ handle ] ) {
    locks[ handle ] = false;
    wp.data.dispatch( 'core/editor' ).unlockPostSaving( handle );
    wp.data.dispatch( 'core/notices' ).removeNotice( handle );
  }
  
}

// Subscibe to data
wp.data.subscribe( () => {

  // Get title
  const postTitle = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'title' );

  // Lock the post if the title is empty.
  lock(
    ! postTitle,
    'title-lock',
    'Please enter a title',
  );


  // Get Featured Image
  const featuredImage = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'featured_media' );

  // Lock post if there is no Featured Image selected
  lock(
    featuredImage === 0,
    'featured-image-lock',
    'Please add a Featured Image',
  );

} );