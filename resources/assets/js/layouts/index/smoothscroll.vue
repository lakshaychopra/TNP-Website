<template>
    <div class="col-xs-12 px-1 d-lg-none" id="go-top">
        <a class="smoothscroll" href="#">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                scrollDuration: 800, // smoothscroll duration
                pxShow: 500, // height on which the button will show
                fadeInTime: 400, // how slow/fast you want the button to show
                fadeOutTime: 400, // how slow/fast you want the button to hide
                scrollSpeed: 300, // how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'
                goTopButton: "#go-top"

            }
        },

        methods: {

            BackToTop() {
                if ($(window).scrollTop() >= this.pxShow) {
                    this.goTopButton.fadeIn(this.fadeInTime);
                } else {
                    this.goTopButton.fadeOut(this.fadeOutTime);
                }
            },

            /* Smooth Scrolling*/
            SmoothScroll() {
                $('.smoothscroll').on('click', function (e) {
                    var target = this.hash,
                        $target = $(target);

                    e.preventDefault();
                    e.stopPropagation();

                    $('html, body').animate({
                        'scrollTop': $target.offset().top
                    }, this.scrollDuration, 'swing', function () {
                        window.location.hash = target;
                    });

                });
            },
        },
    }
</script>

<style scoped>
    #go-top {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 1022;
        display: block;
        border-radius: 100%;
        background: #007bff8a;
    }

    #go-top a,
    #go-top a:visited {
        text-decoration: none;
        height: 50px;
        width: 50px;
        text-align: center;
        border-radius: 100%;
        color: #ffffff;
        transition: all 0.3s ease-in-out;
    }

    #go-top a i,
    #go-top a:visited i {
        font-size: 18px;
        line-height: inherit;
        color: #ffffff;
    }

    #go-top a:hover,
    #go-top a:focus,
    #go-top a:hover i,
    #go-top a:focus i {
        color: #007bff;
    }
</style>