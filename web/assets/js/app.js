jQuery(document).ready(function($){

    $('.reply').click(function(e){
        e.preventDefault();
        var $form = $('#form-comment');
        var $this = $(this);
        var parent_id = $this.data('id');
        var $comment = $('#comment-' + parent_id);

        $form.find('h3').text('Répondre à ce commentaire');
        $('#idparent').val(parent_id);
        $comment.after($form);
    })


});


var x = location.hash;

if(x !== 'undefined') {
  $(x).css("background-color", "#e3ed9d80");
  setTimeout(function(){
    $(x).css("background", "white");
  }, 4000);
}
