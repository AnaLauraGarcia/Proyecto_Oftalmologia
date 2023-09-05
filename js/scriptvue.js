
// Creamos nuestra aplicacion.
const miAplicacion = Vue.createApp({
    components: {
        'miheader': component1,
        'mifooter': component2
    }, 
}).mount("#app")