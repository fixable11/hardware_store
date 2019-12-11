import axios from 'axios'

const apiUri = process.env.API_URL;

class apiService {
    constructor(axios) {
        this.http = axios.create({baseURL: apiUri});
        const jwtToken = localStorage.getItem('access_token');
        if (localStorage.getItem('access_token')) {
            this.setAccessToken(jwtToken);
        }
    }

    setAccessToken(accessToken) {
        this.http.defaults.headers.common['Authorization'] = `Bearer ${accessToken}`;
    }

    login(user) {
        return axios.post(process.env.API_URL + 'auth/login', user);
    }

    register(formData) {
        return axios.post(process.env.API_URL + 'register', formData);
    }

    refreshToken(refreshToken) {
        return axios.post(process.env.API_URL + 'auth/refresh', {refresh_token: refreshToken});
    }

    get(url, params = {}) {
        return this.http.get(this.extracted(url), params);
    }

    put(url, formData) {
        return this.http.put(this.extracted(url), formData);
    }

    post(url, formData) {
        this.extracted(url);
        return this.http.post(this.extracted(url), formData);
    }

    extracted(url) {
        let newUrl = url;
        if (url[url.length - 1] === '/') {
            newUrl = url.substring(0, url.length - 1);
        }
        return newUrl;
    }

    delete(url) {
        return this.http.delete(this.extracted(url));
    }
}

export const ApiService = new apiService(axios);