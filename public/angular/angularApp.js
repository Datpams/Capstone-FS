
var angularApp = angular
					.module('angularModule', [])
					.controller("angularController", ['$scope', function ($scope) {
						$scope.message="helllow!, there";

					}]);
				   angularApp.directive('capitalizeFirst', function(uppercaseFilter, $parse) {
				   return {
				     require: 'ngModel',
				     link: function(scope, element, attrs, modelCtrl) {
				        var capitalize = function(inputValue) {
				           var capitalized = inputValue.charAt(0).toUpperCase() +
				               inputValue.substring(1);
				           if(capitalized !== inputValue) {
				              modelCtrl.$setViewValue(capitalized);
				              modelCtrl.$render();
				            }         
				            return capitalized;
				         }
				         var model = $parse(attrs.ngModel);
				         modelCtrl.$parsers.push(capitalize);
				         capitalize(model(scope));
				     }
				   };
				});
