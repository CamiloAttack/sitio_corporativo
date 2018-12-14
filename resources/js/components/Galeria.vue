<template> 
  <div class="view">
     <b-navbar toggleable="md" type="dark" variant="info">
        <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
        <b-navbar-brand href="#"></b-navbar-brand>
        <b-collapse is-nav id="nav_collapse">
           <b-navbar-nav>
              <b-nav-item href="home">Inicio</b-nav-item>
              <b-nav-item href="mitrabajo">Nuestra Empresa</b-nav-item>                         
              <b-nav-item href="#" disabled>Proyectos</b-nav-item>
              <b-nav-item href="contacto">Contacto</b-nav-item>              
           </b-navbar-nav>
           <!-- Right aligned nav items -->
           <b-navbar-nav class="ml-auto">
              <b-nav-form>
                 <b-form-input size="sm" class="mr-sm-2" type="text" placeholder="Buscar por fecha" v-model="query"/>
                 <b-button size="sm" class="my-2 my-sm-0" type="submit"></b-button>
              </b-nav-form>
              <b-nav-item-dropdown text="Lang" right>
                 <b-dropdown-item href="#">EN</b-dropdown-item>
                 <b-dropdown-item href="#">ES</b-dropdown-item>
                 <b-dropdown-item href="#">RU</b-dropdown-item>
                 <b-dropdown-item href="#">FA</b-dropdown-item>
              </b-nav-item-dropdown>
              <!--b-nav-item-dropdown right>
  
                 <template slot="button-content">
                    <em>User</em>
                 </template>
                 <b-dropdown-item href="#">Profile</b-dropdown-item>
                 <b-dropdown-item href="#">Signout</b-dropdown-item>
              </b-nav-item-dropdown-->
           </b-navbar-nav>
        </b-collapse>
     </b-navbar>
     <b-breadcrumb :items="itemsBreadcrumb"/>
     <game-header v-bind:message="message"></game-header>
     <!--input type="number" v-model="indexNext"-->
     <b-container fluid >
        <img-list 
        <div id="">
           <b-modal  id="modal1" nom_multimedia="Bootstrap-Vue" class="modal-footer">
              <b-img fluid :src="'/archivos_media/images/'+mediaSrcModal.multimedia" class='ImgOpacity' v-if="mediaSrcModal.tipo_media_id  === 1" />
              <b-embed v-if="mediaSrcModal.tipo_media_id  === 2" controls="controls"
                 type="iframe"
                 aspect="16by9"
                 :src="'https://www.youtube.com/embed/'+mediaSrcModal.multimedia">
              </b-embed>
              <video ref="videoRef" v-if="mediaSrcModal.tipo_media_id  === 3"  :src="'/archivos_media/videos/'+mediaSrcModal.multimedia" id="video-container" width="100%" controls></video>
              <b-img rounded="circle" alt="img" class="m-1"
                 :src="mediaSrcModalPrev" 
                 @click="addNewMedia(indexPrev)"  id="prev"   v-show="indexPrevHideShow" />
              <b-img rounded="circle" alt="img" class="m-1"
                 :src="mediaSrcModalNext"
                 @click="addNewMedia(indexNext)" id="next"    v-show="indexNextHideShow" />
           </b-modal>
           <div v-if="galeryFilter.length === 0">
              Sin resultados
           </div>
           <div v-else>
              con resultados
           </div>
           <b-card-group deck>
              <div v-for="(item, index) in  galeryFilter">
                <!-- Puntaje @{{  item.total }}-  Basado en @{{  item.cantidad }} evaluaciones-->
                 <b-card 
                    :img-src="'/archivos_media/images/'+item.multimedia"
                    img-alt="Image"
                    img-top
                    tag="article"
                    style="max-width: 20rem;"
                    class="mb-2"  @click="addNewMedia(index)" v-b-modal.modal1 v-if="item.tipo_media_id  === 1">
                    <p class="card-text">
                       {{  item.nom_multimedia }} -  {{  item.created_at }}
                    </p>
                    <b-button href="#" variant="primary">Go somewhere</b-button>
                 </b-card>
                 <article class="card mb-2" role="button" style="max-width: 20rem;" @click="addNewMedia(index)" v-b-modal.modal1 v-if="item.tipo_media_id  === 3">
                    <video ref="videoRef"  :src="'/archivos_media/videos/'+item.multimedia" id="video-container" width="100%" controls></video>
                    <div class="card-body">
                       <p class="card-text">                            
                          {{item.nom_multimedia}}-  {{  item.created_at }}
                       </p>
                       <a href="#" target="_self" class="btn btn-primary">Go somewhere</a>
                    </div>
                 </article>
                 <article class="card mb-2" role="button" style="max-width: 20rem;" @click="addNewMedia(index)" v-b-modal.modal1 v-if="item.tipo_media_id  === 2">
                    <b-embed type="iframe"
                       aspect="16by9"
                       :src="'https://www.youtube.com/embed/'+item.multimedia"
                       allowfullscreen
                       ></b-embed>
                    <div class="card-body">
                       <p class="card-text">                            
                          {{item.nom_multimedia}}-  {{  item.created_at }}
                       </p>
                       <a href="#" target="_self" class="btn btn-primary">{{item.puntaje}}</a>
                    </div>
                 </article>
                 <!--div class="clasificacion">
                    <input v-bind:id="item.id + '2'" type="radio" :name="item.id + 'estrellas'" value="2" @click="votar(2,item.id)"> <label :for="item.id + '2'">&#9733;</label>
                    <input v-bind:id="item.id + '1'" type="radio"  :name="item.id + 'estrellas'" value="1" @click="votar(1,item.id)" ><label :for="item.id + '1'">&#9733;</label>
                 </div-->
              </div>
           </b-card-group>
        </div>
        </img-list>
     </b-container>
     <b-pagination-nav base-url="#" :number-of-pages="length_paginacion" v-model="currentPage"/>
     pagina 
     @{{ currentPage }}      
  
  </div>
</template> 
 
<script> 

Vue.component('game-header', {

    props:['message'],


    template: '<h1>@{{ message }}</h1>'//Sólo muestra el título de la página.
});
 
 export default {  /*Contiene los componentes GameHeader, GameAdd y GameList. 
                        Tiene en data el array games (contiene 3 objetos con el título de los videojuegos). 
                        Con v-bind pasa la propiedad interna games al componente GameList. 
                        Registra el evento new de GameAdd (@new="addNewGame", versión corta de v-on:new="addNewGame") 
                        con el nuevo game y lo añade al array games.*/
  //  el: '#app',


    data: function(){ return{
        
        message: 'Galeria Vue Js Camilo',

        mediaSrcModal:App.$multimedia,//valor para mostrar multimedia en modal Array
        length_paginacion:App.$length_paginacion,
        mediaSrcModalPrev:'', //valor para mostrar imagenen previa en modal  variable string    
        mediaSrcModalNext:'', //valor para mostrar imagenen siguiente en modal  variable string

        indexNext:0,// valor para setear imagen siguiente:  mediaSrcModalNext = this.itemsGaleriaMedia[this.indexNext]

        indexNextHideShow:true,
        indexPrevHideShow:true,        

        indexPrev:0,// valor para setear imagen previa:  mediaSrcModalPrev = this.itemsGaleriaMedia[this.indexPrev]    
        query:'',

        currentPage: 1,

        itemsGaleriaMedia :App.$multimedia,//Iteracion de galeria

        itemsBreadcrumb: [/*{
                text: 'Admin',
                href: '#'
              }, {
                text: 'Manage',
                href: '#'
              }, */{
                text: '',
                active: true
              }]
      }        
    
    },
 
    watch : {

        currentPage() {

            var numPag = this.currentPage;
            this.paginaMultimedia(numPag);
            console.log(this.length_paginacion);

        },
      /*  galeryFilter(){

          this.length_paginacion=this.itemsGaleriaMedia.length;
                      console.log(this.length_paginacion);

        },*/

    },

    computed: {
        galeryFilter: function () {

            console.log(this.findBy(this.itemsGaleriaMedia, this.query, 'created_at'));

            return this.findBy(this.itemsGaleriaMedia, this.query, 'created_at')

        }
    },
 
    methods: {
        
        paginaMultimedia(numPag){ 
            this.$http.get('/proyectos?page='+numPag).then(response => { 
                this.multimedia = response.body; 
                this.itemsGaleriaMedia=this.multimedia;
            }, response => { 
                console.log('Error'); 
            }); 
        }, 

        votar: function (puntaje, multimedia_id) {        
     
            this.$http.get('/proyectos?puntaje='+puntaje+'&multimedia_id='+multimedia_id).then(response => { 
                
            }, response => { 
                console.log('Error'); 
            }); 

        },


        findBy: function (list, value, column) {        
     
          return list.filter(function (item) {
            return item[column].includes(value)
            
          })
        },



        addNewMedia: function (index) {// funcion que agrega el archivo al modal

            this.indexNext =index +1;
            if(this.galeryFilter.length-1 == index) {

               this.indexNextHideShow=false;

            }else{

                this.indexNextHideShow=true;

                switch(this.galeryFilter[this.indexNext].tipo_media_id)
                {

                  case 3:
                  this.mediaSrcModalNext = '/archivos_media/videos/'+this.galeryFilter[this.indexNext].multimedia.replace("mp4","jpg");
                  break;

                  case 2:
                  this.mediaSrcModalNext = '/archivos_media/thumbnail/'+this.galeryFilter[this.indexNext].multimedia+".jpg";
                  break;

                  default:
                  this.mediaSrcModalNext = '/archivos_media/thumbnail/'+this.galeryFilter[this.indexNext].multimedia;

                }

           
            }

           if(index == 0){

                this.indexPrevHideShow=false;
               // this.indexPrev = 0;  

           }else{
      
                this.indexPrevHideShow=true;
                this.indexPrev = index-1;

                switch(this.galeryFilter[this.indexPrev].tipo_media_id)
                {

                  case 3:
                  this.mediaSrcModalPrev = '/archivos_media/videos/'+this.galeryFilter[this.indexPrev].multimedia.replace("mp4","jpg");
                  break;

                  case 2:
                  this.mediaSrcModalPrev = '/archivos_media/thumbnail/'+this.galeryFilter[this.indexPrev].multimedia+".jpg";
                  break;

                  default:
                  this.mediaSrcModalPrev = '/archivos_media/thumbnail/'+this.galeryFilter[this.indexPrev].multimedia;

                }
   
           }
 

           this.mediaSrcModal=this.galeryFilter[index];  


            $("#modal1___BV_modal_body_").addClass("imgModal");      
       
        }

 


    }




};

</script>

