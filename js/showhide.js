/*
 * Show and hide event functions for mapAndForm.php
 */

$(document).ready(function () {

 /****** Remove href tag from browser ******/
 $("a").removeAttr("href");

 // First transition
 $('#next').click(function () {
  $('#introtext').hide();
  $('#addresstext').hide();
  $('#greetingtext').show('drop', {
   direction: 'right'
  }, 500);

 });

 //Second Transition
 $('#yes').click(function () {
  $('#mapandinfo').hide();

  $('#threeQuestions').show('drop', {
   direction: 'right'
  }, 500);

 });

 /*** Third Transition */
 $('#linkToNameAndEmail').click(function () {

  $('#threeQuestions').hide();
  $('#nameAndEmail').show('drop', {
   direction: 'right'
  }, 500);
 });

});
