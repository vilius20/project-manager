/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/groups.js ***!
  \********************************/
// Getting every form value and putting to URL
var selects = document.querySelectorAll(".students").forEach(function (select) {
  select.addEventListener("change", function () {
    var groupForm = document.getElementById("group-form");
    var value = select.value; // Values of group ID and student ID

    var arr = value.split(" "); // Ready url

    var link = "/assign-student/" + arr[1] + "/" + arr[0]; // Putting link in action atribute

    groupForm.action = link; // Submiting form after select value changes

    groupForm.submit();
  });
});
/******/ })()
;