var app = angular.module('searchModule', []);
app.controller('searchController', function($scope) {
 $scope.data = data;
$scope.setQuery = function(query) {
 $scope.query = query;
 $scope.focus = false;
 };
});
app.filter('search', function() {
 return search;
});
function search(arr, query) {
 if (!query) {
 return arr;
 }
var results = [];
 query = query.toLowerCase();
angular.forEach(arr, function(item) {
 if (item.toLowerCase().indexOf(query) !== -1) {
 results.push(item);
 }
 });
return results;
};