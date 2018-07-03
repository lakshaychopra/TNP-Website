export default {

    logout() {
        return axios.post('/api/logout').then(response => {
            localStorage.removeItem('token');
            axios.defaults.headers.common['Authorization'] = null;
            toastr['success'](response.data.message);
        }).catch(error => {
            console.log(error);
        });
    },

    authUser() {
        return axios.get('/api/dashboard/auth/user').then(response => {
            return response.data;
        }).catch(error => {
            return error.response.data;
        });
    },

    check() {
        return axios.post('/api/check').then(response => {
            return !!response.data.authenticated;
        }).catch(error => {
            return response.data.authenticated;
        });
    },

    setToken: (token) => {
        localStorage.setItem('token', token)
            // localStorage.setItem('expiration', expiration), expiration
    },
    getToken: () => {
        var token = localStorage.getItem('token')
            // var expiration = localStorage.getItem('expiration')
        if (!token) {
            return null
        }

        // if (!token || !expiration) {
        //     return null
        // }
        // if (Date.now() > parseInt(expiration)) {
        //     this.destroyToken()
        //     return null
        // } else
        return token
    },
    destroyToken: () => {
        localStorage.removeItem('token')
            // localStorage.removeItem('expiration')
    },
    isAuthenticated: () => {
        if (this.getToken()) {
            return true
        } else {
            return false
        }
    },

    getFilterURL(data) {
        let url = '';
        $.each(data, function(key, value) {
            url += (value) ? '&' + key + '=' + encodeURI(value) : '';
        });
        return url;
    },

    formAssign(form, data) {
        for (let key of Object.keys(form)) {
            if (key !== "originalData" && key !== "errors" && key !== "autoReset") {
                form[key] = data[key];
            }
        }
        return form;
    },

    taskColor(value) {
        let classes = ['progress-bar', 'progress-bar-striped'];
        if (value < 20)
            classes.push('bg-danger');
        else if (value < 50)
            classes.push('bg-warning');
        else if (value < 80)
            classes.push('bg-info');
        else
            classes.push('bg-success');
        return classes;
    },

    formatDate(date) {
        if (!date)
            return;

        return moment(date).format('MMMM Do YYYY');
    },

    formatDateTime(date) {
        if (!date)
            return;

        return moment(date).format('MMMM Do YYYY h:mm a');
    },

    ucword(value) {
        if (!value)
            return;

        return value.toLowerCase().replace(/\b[a-z]/g, function(value) {
            return value.toUpperCase();
        });
    }
}