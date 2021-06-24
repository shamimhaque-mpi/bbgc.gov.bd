<style>
    .marquee p{
        margin-bottom: 0;
    }
    .colok {
        color: #06f806;
        background: #010900;
        margin: 0;
        text-align: center;
        padding: 20px;
        font-size: 26px;
        border: 10px solid #042c00;
    }
    .countdown {
        width: 100%;
        height: auto;
        border: 1px solid #FCDDDD;
        border-radius: 5px;
        background: #FCF3F3;
    }

    .mujib-image img {
        width: 60%;
        padding-left: 15px;
        margin: 10px auto;
    }



    .flip-clock {
        margin-bottom: 40px;
        margin-top: -30px;
    }

    .card__top {
        background: #C4161C;
        padding: 3px;
        font-size: 22px;
        color: #fff;
        display: inline-block;
        border-radius: 5px;
        margin-right: 13px;
        margin-left: 10px;
        width: 15%;
    }

    .flip-clock__slot {
        position: absolute;
        margin-left: -48px;
        bottom: 14px;
    }

    /* Tablet Layout: 768px. */
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .mujib-image img {
            width: 27% !important;
            overflow: hidden;
        }

    }

    /* Mobile Layout: 320px. */
    @media only screen and (max-width: 767px) {
        .mujib-image img {
            width: 64% !important;
            margin-top: 10px !important;
            overflow: hidden;
        }

    }

    /* Wide Mobile Layout: 480px. */
    @media only screen and (min-width: 480px) and (max-width: 767px) {
        .mujib-image img {
            width: 47% !important;
            margin-top: 10px !important;
        }
    }
    .pannel-custom a:hover{
        text-decoration: none;
    }
</style>
<!-- aside -->
<div class="col-md-3 col-sm-12 col-xs-12 custom-sm">
    <div class="row">
        
        <div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                <div class="pannel-custom" style="border-color: #288d01;margin: 5px 5px 10px;"> 
                    <?php 
                        $admission_permission = NULL;
                        $admission_permission = $this->action->read('online_admission_permission');
                        if($admission_permission[0]->permission_status=='Active'){
                    ?>
                	<a target="_blank" href="<?php echo site_url('/access/subscriber/login'); ?>">
                	    <h3 style="background:#288d01;color:#fff; font-size: 17px;font-weight: bold;">Online Admission</h3>
                	    </a>
                	<?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                <div class="pannel-custom">
                    <h3>মুজিব বর্ষ</h3>
                    <div>
                        <img width="100%" src="<?php echo site_url('public/img/22.jpg'); ?>" alt="">
                        <div id="countdown_block" style="max-width: 100%">
                            <div class="flip-clock"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                <div class="pannel-custom">
                    <h3><a style="text-decoration: none; color: #fff;" href="<?php echo site_url('home/showResults'); ?>" target="_blank">পরীক্ষার ফলাফল</a></h3>

                </div>
            </div>
        </div>
        
        <div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                
                    <div class="pannel-custom">
                        <h3>নোটিশ বোর্ড</h3>
                        <div class="marquee ver" data-direction='up' data-duration='5500' data-pauseOnHover="true" style="height:330px;margin-bottom:3px;">
                            <ul>
                               <?php foreach ($latest_notice as $key => $notice) { ?>
                                <li>
                                    <a href="<?php echo site_url('home/notice'); ?>?id=<?php echo $notice->id ?>" target="_blank">
                                       <?php echo $notice->notice_title; ?>
                                    </a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>

			 <!-- <div class="pannel-custom pannel-custom-new res-margin-right-5">-->   
             
            </div>
        </div>
		
    	<div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                <div class="pannel-custom">
                    <h3>গুরুত্বপূর্ণ লিঙ্ক</h3>
                    <ul>                      
                        <li><a href="http://www.nctb.gov.bd/" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></i> এনসিটিবি</a></li>                                         
                        <li><a href="https://www.teachers.gov.bd/" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></i> শিক্ষক বাতায়ন </a></li>
                                     
                        <li><a href="http://www.moedu.gov.bd" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></i> শিক্ষা মন্ত্রনালয়</a></li>
                         <li><a href="http://dhakaeducationboard.gov.bd/" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></i> ঢাকা শিক্ষা বোর্ড </a></li>     
                        <li><a href="http://tarakanda.mymensingh.gov.bd/" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></i> তারাকান্দা উপজেলা</a></li>
                         <li><a href="http://www.bangladesh.gov.bd/" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></i> জাতীয় ওয়েব পোর্টাল </a></li>        
                             
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                <div class="pannel-custom">
                    <h3>ভিজিটর</h3>
                    <ul>                      
                        <li>মোট ভিজিটর : <span><strong><?php echo count($total_visitor);?></strong></span> জন</li>                                        
                        <li>আজকের ভিজিটর : <span><strong><?php echo count($todays_visitor);?></strong></span> জন</li>
                        <li>বর্তমানে অনলাইনে আছে : <span><strong><?php echo $current_visitor;?></strong></span></li>
                    </ul>
                </div>
            </div>
        </div>
		
		

    </div>
</div>
<script type="text/javascript">
    var cur_lang = 'bn';
</script>

<script type="text/javascript">
    console.clear();
    function CountdownTracker(label, value) {

        var el = document.createElement('span');

        el.className = 'flip-clock__piece';
        el.innerHTML = '<b class="flip-clock__card card"><b class="card__top"></b><b class="card__bottom"></b><b class="card__back"><b class="card__bottom"></b></b></b>' +
            '<span class="flip-clock__slot">' + label + '</span>';

        this.el = el;

        var top = el.querySelector('.card__top'),
            bottom = el.querySelector('.card__bottom'),
            back = el.querySelector('.card__back'),
            backBottom = el.querySelector('.card__back .card__bottom');

        this.update = function (val) {
            val = ('০' + val).slice(-2);
            if (val !== this.currentValue) {

                if (this.currentValue >= 0) {
                    back.setAttribute('data-value', this.currentValue);
                    bottom.setAttribute('data-value', this.currentValue);
                }
                this.currentValue = val;
                top.innerText = this.currentValue;
                backBottom.setAttribute('data-value', this.currentValue);

                this.el.classList.remove('flip');
                void this.el.offsetWidth;
                this.el.classList.add('flip');
            }
        }

        this.update(value);
    }



    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        // return {
        //   'Total': t,
        //   'Days': Math.floor(t / (1000 * 60 * 60 * 24)),
        //   'Hours': Math.floor((t / (1000 * 60 * 60)) % 24),
        //   'Minutes': Math.floor((t / 1000 / 60) % 60),
        //   'Seconds': Math.floor((t / 1000) % 60)
        // };
        if (cur_lang == 'bn') {
            return {
                'Total': t,
                'দিন': Math.floor(t / (1000 * 60 * 60 * 24)),
                'ঘণ্টা': Math.floor((t / (1000 * 60 * 60)) % 24),
                'মিনিট': Math.floor((t / 1000 / 60) % 60),
                'সেকেন্ড': Math.floor((t / 1000) % 60)
            };
        } else if (cur_lang == 'en') {
            return {
                'Total': t,
                'Days': Math.floor(t / (1000 * 60 * 60 * 24)),
                'Hours': Math.floor((t / (1000 * 60 * 60)) % 24),
                'Minutes': Math.floor((t / 1000 / 60) % 60),
                'Seconds': Math.floor((t / 1000) % 60)
            };
        }
    }

    // banglaDefine function
    function defineBangla(val) {
        var EnlishToBanglaNumber = { '0': '০', '1': '১', '2': '২', '3': '৩', '4': '৪', '5': '৫', '6': '৬', '7': '৭', '8': '৮', '9': '৯' };
        String.prototype.getDigitBanglaFromEnglish = function () {
            var retStr = this;
            for (var x in EnlishToBanglaNumber) {
                retStr = retStr.replace(new RegExp(x, 'g'), EnlishToBanglaNumber[x]);
            }
            return retStr;
        };
        var english_number = '' + val;
        var bangla_converted_number = english_number.getDigitBanglaFromEnglish();
        return bangla_converted_number;
    }


    function getTime() {
        var t = new Date();
        return {
            'Total': t,
            'Hours': t.getHours() % 12,
            'Minutes': t.getMinutes(),
            'Seconds': t.getSeconds()
        };
    }

    function Clock(countdown, callback) {

        countdown = countdown ? new Date(Date.parse(countdown)) : false;
        callback = callback || function () { };

        var updateFn = countdown ? getTimeRemaining : getTime;

        this.el = document.createElement('div');
        this.el.className = 'flip-clock';

        var trackers = {},
            t = updateFn(countdown),
            key, timeinterval;

        for (key in t) {
            if (key === 'Total') { continue; }
            trackers[key] = new CountdownTracker(key, defineBangla(t[key]));
            this.el.appendChild(trackers[key].el);
        }

        var i = 0;
        function updateClock() {
            timeinterval = requestAnimationFrame(updateClock);

            // throttle so it's not constantly updating the time.
            if (i++ % 10) { return; }

            var t = updateFn(countdown);
            if (t.Total < 0) {
                cancelAnimationFrame(timeinterval);
                for (key in trackers) {
                    trackers[key].update(0);
                }
                callback();
                return;
            }

            for (key in trackers) {
                trackers[key].update(defineBangla(t[key]));
            }
        }

        setTimeout(updateClock, 500);
    }

    var deadline = new Date("Mar 17, 2020 00:00:01");
    // var deadline = new Date(Date.parse(new Date()) + 12 * 24 * 60 * 60 * 1000);
    var c = new Clock(deadline, function () { 
        //alert('countdown complete') 
    });
    // document.body.appendChild(c.el);

    document.getElementById('countdown_block').appendChild(c.el);

                        //See Current Time
                        //var clock = new Clock();
                        //document.body.appendChild(clock.el);
</script>

<script type="text/javascript">
    // js for bg
    (function () {
        var c;
        var ctx;
        var width;
        var height;

        var axes = [];
        var wanderers = [];
        var colors = [
            "#FFCC00",
            "#66CCF0",
            "#FF0033",
            "#99CC33"
        ];

        window.onload = function () {

            c = document.getElementById("canvas");
            ctx = c.getContext("2d");
            window.onresize = onResize;
            window.onmousedown = onMouseDown;
            onResize();

            setInterval(update, 50);

        }

        function onResize(e) {

            //width = getWidth( document.getElementById(mojib_countdown) );
            width = 336;
            //height = getHeight( document.getElementById(mojib_countdown) );
            height = 280;

            c.width = width;
            c.height = height;

            reset();

        }

        /*function getWidth( element ){return Math.max(element.scrollWidth,element.offsetWidth,element.clientWidth );}
        function getHeight( element ){return Math.max(element.scrollHeight,element.offsetHeight,element.clientHeight );}*/

        function reset() {
            axes = [];

            var random = 500;

            var cols = 30;
            for (var i = 0; i < cols; i++) {
                var a = new point(width / cols * i + random * Math.random(), 0);
                var b = new point(width / cols * i + random * Math.random(), height);
                axes.push(new Axe(a, b));
            }

            var rows = 20;
            for (var i = 0; i < rows; i++) {
                var a = new point(0, height / rows * i + random * Math.random());
                var b = new point(width, height / rows * i + random * Math.random());
                axes.push(new Axe(a, b));
            }
            wanderers = [];
            for (var i = 0; i < colors.length * 3; i++) {
                wanderers.push(new wanderer(Math.random() * width, Math.random() * height,
                    0,
                    Math.random() + .5, colors[i % colors.length]));
            }

        }

        function onMouseDown() {
            reset();
        }

        function update() {

            ctx.fillStyle = "rgba(255,255,255,.25)";
            ctx.globalCompositeOperation = "lighten";
            ctx.fillRect(0, 0, width, height);
            ctx.globalCompositeOperation = "source-over";

            ctx.strokeStyle = "rgba(16,16,16,.01 )";
            for (var j = 0; j < axes.length; j++)axes[j].draw(ctx);

            for (var i = 0; i < wanderers.length; i++) {

                var hull = [];
                var pp_hull = [];
                var p = wanderers[i];
                p.update(width, height);

                ctx.beginPath();

                ctx.fillStyle = p.color;
                ctx.arc(p.x, p.y, 8, 0, Math.PI * 2, true);
                ctx.fill();

                ctx.closePath();

                for (var j = 0; j < axes.length; j++) {

                    var axe = axes[j];

                    var r = axe.reflect(p);

                    ctx.beginPath();

                    ctx.fillStyle = p.color;
                    ctx.arc(r.x, r.y, 2, 0, Math.PI * 2, true);
                    ctx.fill();

                    ctx.closePath();

                }
            }
        }

        var Axe = function (a, b) { this.a = a; this.b = b; }
        Axe.prototype =
        {
            draw: function (ctx) { ctx.beginPath(); ctx.moveTo(this.a.x, this.a.y); ctx.lineTo(this.b.x, this.b.y); ctx.stroke(); ctx.closePath(); }
            , reflect: function (p) { return utils.reflect(p, this.a, this.b); }
        }

        var wanderer = function (x, y, a, s, color) { this.x = x || 0; this.y = y || 0; this.a = a || 0; this.s = s || 1; this.color = color || "#000"; }
        wanderer.prototype =
        {
            update: function (width, height) {
                with (this) {
                    a += (Math.random() - .5) * 10 / 180 * Math.PI;

                    x += Math.cos(a) * s;
                    y += Math.sin(a) * s;

                    if (x < 0
                        || y < 0
                        || x > width
                        || y > height) a += Math.PI / 180;
                }
            }
        }

        var point = function (x, y) { this.x = x || 0; this.y = y || 0; }
        var utils = function () { };
        utils.reflect = function (p, a, b) {
            var pp = utils.project(p, a, b, false);
            return new point(p.x + (pp.x - p.x) * 2, p.y + (pp.y - p.y) * 2);
        }
        utils.project = function (p, a, b, asSegment) {
            var dx = b.x - a.x;
            var dy = b.y - a.y;
            if (asSegment && dx == 0 && dy == 0) { return a; }
            var t = ((p.x - a.x) * dx + (p.y - a.y) * dy) / (dx * dx + dy * dy);
            if (asSegment && t < 0) return a;
            if (asSegment && t > 1) return b;
            return new point(a.x + t * dx, a.y + t * dy);
        }

    })();
</script>
