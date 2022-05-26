/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/groups.js ***!
  \********************************/
console.log("Nwss");
var selects = document.querySelectorAll(".students").forEach(function (select) {
  select.addEventListener("change", function () {
    var groupForm = document.getElementById("group-form");
    var value = select.value;
    var studentId = value.substring(2);
    var groupId = value.slice(0, 1);
    var link = "/assign-student/" + studentId + "/" + groupId;
    groupForm.action = link;
    groupForm.submit();
  });
});
/******/ })()
;