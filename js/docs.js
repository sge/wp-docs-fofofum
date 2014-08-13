jQuery(document).ready( function($) {
  // add active state to faqs
  $('.qa-faq-title').addClass('closed');
  $('.qa-faq-anchor').on("click", function() {
    var $question = $(this).parent();
    if ( $question.hasClass('open') ) {
      $question.removeClass('open');
      $question.addClass('closed');
    } else {
      $question.removeClass('closed');
      $question.addClass('open');
    }
  });

  // faq sidebar
  $('.faq-list li a').on('click', function(e) {
    e.preventDefault();
    var $this = $(this)
      , qa_cat = $this.parent().attr('class').split(' ')[1]
      , $catSection = $('.qa-category')
      ;
    if ( $this.parent().hasClass('parent_item') ) {
      $catSection.show();
    } else {
      $catSection.hide();
      console.log(qa_cat);
      $('.'+qa_cat).show();
    }
  });
});