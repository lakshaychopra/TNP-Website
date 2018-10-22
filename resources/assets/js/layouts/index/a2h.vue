<template>
    <div class="container-fluid">
        <div class="row">
            <div class="ad2hs-prompt bounceInUp">
                <div class="col">
                    <h1>Add T&amp;P To Your Homescreen!</h1>
                </div>
                <div class="col">
                    <button class="btn btn-block py-3 my-3">Add To Your Homescreen</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
    @keyframes bounceInUp {

        from,
        60%,
        75%,
        90%,
        to {
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        from {
            opacity: 0;
            transform: translate3d(0, 3000px, 0);
        }

        60% {
            opacity: 1;
            transform: translate3d(0, -20px, 0);
        }

        75% {
            transform: translate3d(0, 10px, 0);
        }

        90% {
            transform: translate3d(0, -5px, 0);
        }

        to {
            transform: translate3d(0, 0, 0);
        }
    }

    .bounceInUp {
        animation-name: bounceInUp;
    }

    .btn {
        border: none;
        border-radius: 25px;
        text-transform: uppercase;
        vertical-align: middle;
        font-size: 20px;
        color: #ffffff;
        outline: 0;
        text-decoration: none;
        text-align: center;
        background:#1952ab;
    }

    .ad2hs-prompt {
        display: none;
        width: 100vw;
        background-color: #038ed4;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        padding: 1% 3%;
        position: fixed;
        bottom: 0;
        left: 0;
        animation-duration: 2s;
        animation-fill-mode: both;
        z-index: 9999;
    }

    .ad2hs-prompt:hover {
        box-shadow: 0 0 0 0 0.25rem;
    }

    .ad2hs-prompt a:focus {
        text-decoration: underline;
    }

    .ad2hs-prompt:focus-within {
        box-shadow: 0 0 0 0.25rem;
    }

    .ad2hs-prompt:focus-within a:focus {
        text-decoration: none;
    }

    .ad2hs-prompt h1 {
        text-align: center;
        color: #ffffff
    }

    .ad2hs-prompt>*+* {
        margin-top: 0.75rem;
    }
</style>

<script>

</script>