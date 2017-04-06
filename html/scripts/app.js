angular
	.module('atlas', ['ui.router', 'ngAnimate', 'ngMaterial', 'ng-mfb'])

	.config(function($stateProvider, $urlRouterProvider, $httpProvider, $mdThemingProvider) {

		$mdThemingProvider.theme('default')
			.primaryPalette('green')
			.accentPalette('green', {
				'default': '300'
			});

		$urlRouterProvider.otherwise('/home');

		$stateProvider

			.state('home', {
				url: '/home',
				templateUrl: 'views/main.html'
			})
			.state('first', {
				url: '/atlas',
				views: {
					'': { templateUrl: 'views/first.html' },
					'login@first': {
						templateUrl: 'views/login.html',
						controller: 'LoginController'
					},
					'signup@first': {
						templateUrl: 'views/signup.html',
						controller: 'SignupController'
					},
					'map@first': {
						templateUrl: 'views/map.html'
						/*,
						          controller: 'MapController'*/
					}
				}
			})
			.state('first.zona1', {
				url: '/ÁreaentrelasfallasOtú-PericosyCauca-Almague'
			})
			/*state('insert', {
			  url : '/' + localStorage.typeuser + '/newsample',
			  templateUrl: 'views/insert.html',
			  controller : 'NewSampleController'
			})*/
			.state('sample', {
				url: '/sample',
				templateUrl: 'views/sample.html'
				/*,
				      controller: 'SampleController'*/
			})

			.state('glosario', {
				url: '/glosario',
				templateUrl: 'views/Glosario.html'
			})
			.state('creditos', {
				url: '/creditos',
				templateUrl: 'views/credits.html'
			})

			.state('muestras', {
				url: '/muestras',
				templateUrl: 'views/newmuestras_pag.php'
			});
	});
