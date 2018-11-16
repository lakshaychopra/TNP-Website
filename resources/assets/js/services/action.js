export default {

    moveBack() {
        if (window.history.go() == undefined) {
            this.$router.push('/');
        }
        window.history.go(-1);
    }
}