/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require("axios");

require("./bootstrap");


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// barchart
// import BarChart from "./components/Bar.vue";
// Vue.component("Bar", BarChart);

// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );
 
// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );
 
// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );

// asseveerator chart
// import AsseveratorChart from "./components/AsseveratorChart.vue";
// Vue.component("AsseveratorChart", AsseveratorChart);

// practice creation loader

// import PracticeLoader from "./components/PracticeLoader.vue";
// Vue.component("PracticeLoader", PracticeLoader);

// import { AtomSpinner } from "epic-spinners";
// Vue.component("AtomSpinner", AtomSpinner);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// const app = new Vue({
//     el: "#app",
//     data: {
//         isModalVisible: true,
//         isListVisible: false,
//         isPhotos: true,
//         isVideos: false,
//         isLoading: false,
//         photos:[],
//         videos:[],
//         path_photo: '/img/placeholder.png',
//         path_video: ''
//     },
//     methods: {
//         closeModal() {
//             this.isModalVisible = false;
//         },
//         openList() {
//             if (this.isListVisible == false) {
//                 this.isListVisible = true;
//             } else {
//                 this.isListVisible = false;
//             }
//         },
//         photosPage() {
//             if (this.isPhotos == false) {
//                 this.isPhotos = true;
//                 this.isVideos = false;
//             }
//         },
//         videosPage() {
//             if (this.isVideos == false) {
//                 this.isVideos = true;
//                 this.isPhotos = false;
//             }
//         },
//         startLoading() {
//             this.isLoading = true;
//         },
//         showImage(path){
//             return this.path_photo = window.location.origin + '/storage/' + path;
//         },
//         showVideo(path) {
//             return this.path_video = window.location.origin + '/storage/' + path;
//         }
//     },
//
//     mounted() {
//         const Urlphoto = Axios.get("/photos_practice");
//         const Gps = Axios.get("/videos_practice");
//
//         Axios.all([Urlphoto, Gps])
//         .then(resp => {
//             this.photos = resp[0].data.data;
//             this.videos = resp[1].data.data;
//         })
//         .catch(e =>{
//             console.error('Sorry: ' + e);
//         })
//
//     }
// });
