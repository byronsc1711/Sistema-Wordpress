( function( $ ){
    $( document ).ready( function(){
						
      $( '.tsp-btn-get-started' ).on( 'click', function( e ) {
          e.preventDefault();
          $( this ).html( 'Installing demo installer.. Please wait' ).addClass( 'updating-message' );
          $.post( tsp_ajax_object.ajax_url, { 'action' : 'install_act_plugin' }, function( response ){
              location.href = 'themes.php?page=advanced-import';
          } );
      } );
    } );

}( jQuery ) )