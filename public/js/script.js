/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/***/ (() => {

eval("setTimeout(function () {\n  $('#alert').slideUp();\n}, 4000);\n$('#lfm').filemanager('image');\n$(document).ready(function () {\n  $('#description').summernote();\n});\n$(document).ready(function () {\n  $('#summary').summernote();\n}); // Banners\n\n$.ajaxSetup({\n  headers: {\n    'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n  }\n});\n$('.dltBtn_banner').click(function (e) {\n  var form = $(this).closest('form');\n  var dataID = $(this).data('id');\n  e.preventDefault();\n  swal({\n    title: \"Are you sure?\",\n    text: \"Once deleted, you will not be able to recover this banner!\",\n    icon: \"warning\",\n    buttons: true,\n    dangerMode: true\n  }).then(function (willDelete) {\n    if (willDelete) {\n      form.submit();\n      swal(\"Banner has been deleted!\", {\n        icon: \"success\"\n      });\n    } else {\n      swal(\"Banner is saved!\");\n    }\n  });\n}); // Categories\n\n$('#is_parent').change(function (e) {\n  e.preventDefault();\n  var is_checked = $('#is_parent').prop('checked');\n\n  if (is_checked) {\n    $('#parent_cat_div').addClass('d-none');\n    $('#parent_cat_div').val('');\n  } else {\n    $('#parent_cat_div').removeClass('d-none');\n  }\n});\n$.ajaxSetup({\n  headers: {\n    'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n  }\n});\n$('.dltBtn_category').click(function (e) {\n  var form = $(this).closest('form');\n  var dataID = $(this).data('id');\n  e.preventDefault();\n  swal({\n    title: \"Are you sure?\",\n    text: \"Once deleted, you will not be able to recover this category!\",\n    icon: \"warning\",\n    buttons: true,\n    dangerMode: true\n  }).then(function (willDelete) {\n    if (willDelete) {\n      form.submit();\n      swal(\"Category has been deleted!\", {\n        icon: \"success\"\n      });\n    } else {\n      swal(\"Category is safe!\");\n    }\n  });\n}); // Products\n// toggle d-none for subcategories//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2NyaXB0LmpzPzg3MzMiXSwibmFtZXMiOlsic2V0VGltZW91dCIsIiQiLCJzbGlkZVVwIiwiZmlsZW1hbmFnZXIiLCJkb2N1bWVudCIsInJlYWR5Iiwic3VtbWVybm90ZSIsImFqYXhTZXR1cCIsImhlYWRlcnMiLCJhdHRyIiwiY2xpY2siLCJlIiwiZm9ybSIsImNsb3Nlc3QiLCJkYXRhSUQiLCJkYXRhIiwicHJldmVudERlZmF1bHQiLCJzd2FsIiwidGl0bGUiLCJ0ZXh0IiwiaWNvbiIsImJ1dHRvbnMiLCJkYW5nZXJNb2RlIiwidGhlbiIsIndpbGxEZWxldGUiLCJzdWJtaXQiLCJjaGFuZ2UiLCJpc19jaGVja2VkIiwicHJvcCIsImFkZENsYXNzIiwidmFsIiwicmVtb3ZlQ2xhc3MiXSwibWFwcGluZ3MiOiJBQUFBQSxVQUFVLENBQUMsWUFBWTtBQUNuQkMsRUFBQUEsQ0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZQyxPQUFaO0FBQ0gsQ0FGUyxFQUVQLElBRk8sQ0FBVjtBQUlBRCxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVFLFdBQVYsQ0FBc0IsT0FBdEI7QUFFQUYsQ0FBQyxDQUFDRyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCSixFQUFBQSxDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCSyxVQUFsQjtBQUNILENBRkQ7QUFJQUwsQ0FBQyxDQUFDRyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCSixFQUFBQSxDQUFDLENBQUMsVUFBRCxDQUFELENBQWNLLFVBQWQ7QUFDSCxDQUZELEUsQ0FLQzs7QUFDREwsQ0FBQyxDQUFDTSxTQUFGLENBQVk7QUFDUkMsRUFBQUEsT0FBTyxFQUFFO0FBQ0wsb0JBQWdCUCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QlEsSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWDtBQURELENBQVo7QUFLQVIsQ0FBQyxDQUFDLGdCQUFELENBQUQs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InNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICQoJyNhbGVydCcpLnNsaWRlVXAoKTtcbn0sIDQwMDApO1xuXG4kKCcjbGZtJykuZmlsZW1hbmFnZXIoJ2ltYWdlJyk7XG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICQoJyNkZXNjcmlwdGlvbicpLnN1bW1lcm5vdGUoKTtcbn0pO1xuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAkKCcjc3VtbWFyeScpLnN1bW1lcm5vdGUoKTtcbn0pO1xuXG5cbiAvLyBCYW5uZXJzXG4kLmFqYXhTZXR1cCh7XG4gICAgaGVhZGVyczoge1xuICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgIH1cbn0pO1xuJCgnLmRsdEJ0bl9iYW5uZXInKS5jbGljayhmdW5jdGlvbiAoZSkge1xuICAgIHZhciBmb3JtPSQodGhpcykuY2xvc2VzdCgnZm9ybScpO1xuICAgIHZhciBkYXRhSUQ9JCh0aGlzKS5kYXRhKCdpZCcpO1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICBzd2FsKHtcbiAgICAgICAgdGl0bGU6IFwiQXJlIHlvdSBzdXJlP1wiLFxuICAgICAgICB0ZXh0OiBcIk9uY2UgZGVsZXRlZCwgeW91IHdpbGwgbm90IGJlIGFibGUgdG8gcmVjb3ZlciB0aGlzIGJhbm5lciFcIixcbiAgICAgICAgaWNvbjogXCJ3YXJuaW5nXCIsXG4gICAgICAgIGJ1dHRvbnM6IHRydWUsXG4gICAgICAgIGRhbmdlck1vZGU6IHRydWUsXG4gICAgfSlcbiAgICAudGhlbigod2lsbERlbGV0ZSkgPT4ge1xuICAgICAgICBpZiAod2lsbERlbGV0ZSkge1xuICAgICAgICAgICAgZm9ybS5zdWJtaXQoKTtcbiAgICAgICAgICAgIHN3YWwoXCJCYW5uZXIgaGFzIGJlZW4gZGVsZXRlZCFcIiwge1xuICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBzd2FsKFwiQmFubmVyIGlzIHNhdmVkIVwiKTtcbiAgICAgICAgfVxuICAgIH0pO1xufSlcblxuXG4gLy8gQ2F0ZWdvcmllc1xuJCgnI2lzX3BhcmVudCcpLmNoYW5nZShmdW5jdGlvbiAoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB2YXIgaXNfY2hlY2tlZCA9ICQoJyNpc19wYXJlbnQnKS5wcm9wKCdjaGVja2VkJyk7XG4gICAgaWYgKGlzX2NoZWNrZWQpIHtcbiAgICAgICAgJCgnI3BhcmVudF9jYXRfZGl2JykuYWRkQ2xhc3MoJ2Qtbm9uZScpO1xuICAgICAgICAkKCcjcGFyZW50X2NhdF9kaXYnKS52YWwoJycpO1xuICAgIH1cbiAgICBlbHNlIHtcbiAgICAgICAgJCgnI3BhcmVudF9jYXRfZGl2JykucmVtb3ZlQ2xhc3MoJ2Qtbm9uZScpO1xuICAgIH1cbn0pXG4kLmFqYXhTZXR1cCh7XG4gICAgaGVhZGVyczoge1xuICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICB9XG4gICAgfSk7XG4kKCcuZGx0QnRuX2NhdGVnb3J5JykuY2xpY2soZnVuY3Rpb24gKGUpIHtcbiAgICB2YXIgZm9ybT0kKHRoaXMpLmNsb3Nlc3QoJ2Zvcm0nKTtcbiAgICB2YXIgZGF0YUlEPSQodGhpcykuZGF0YSgnaWQnKTtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIHN3YWwoe1xuICAgICAgICAgICAgdGl0bGU6IFwiQXJlIHlvdSBzdXJlP1wiLFxuICAgICAgICAgICAgdGV4dDogXCJPbmNlIGRlbGV0ZWQsIHlvdSB3aWxsIG5vdCBiZSBhYmxlIHRvIHJlY292ZXIgdGhpcyBjYXRlZ29yeSFcIixcbiAgICAgICAgICAgIGljb246IFwid2FybmluZ1wiLFxuICAgICAgICAgICAgYnV0dG9uczogdHJ1ZSxcbiAgICAgICAgICAgIGRhbmdlck1vZGU6IHRydWUsXG4gICAgICAgICAgICB9KVxuICAgIC50aGVuKCh3aWxsRGVsZXRlKSA9PiB7XG4gICAgICAgIGlmICh3aWxsRGVsZXRlKSB7XG4gICAgICAgICAgICBmb3JtLnN1Ym1pdCgpO1xuICAgICAgICAgICAgc3dhbChcIkNhdGVnb3J5IGhhcyBiZWVuIGRlbGV0ZWQhXCIsIHtcbiAgICAgICAgICAgICAgICBpY29uOiBcInN1Y2Nlc3NcIixcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgc3dhbChcIkNhdGVnb3J5IGlzIHNhZmUhXCIpO1xuICAgICAgICAgICAgfVxuICAgIH0pO1xufSlcblxuXG4gLy8gUHJvZHVjdHNcbiAvLyB0b2dnbGUgZC1ub25lIGZvciBzdWJjYXRlZ29yaWVzXG5cbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc2NyaXB0LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/script.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/script.js"]();
/******/ 	
/******/ })()
;