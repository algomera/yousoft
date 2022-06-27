<div class="bg-white">
    <div class="nav_bonus">
        <a  :class="{frame :isPhotos }"  @click="photosPage()">Foto</a> 
        <a  :class="{frame : isVideos}" @click="videosPage()">Videoispezioni</a>
    </div>
    @if(sizeof($photos) > 0)
        <div class="px-20 py-5">
            <div class="row">
                <div class="col-4">
                    <div class="preview mt-2">
                        <img :src="`${path_photo}`" alt="image" class="img-fluid">
                    </div>
                </div>
                <div class="col-8">
                    <div class="table mt-2">
                        <table class="table_bonus" style="width: 100%">
                            <thead>
                                <tr style="border-top: 1px solid #707070">
                                    <th style="width: 10%">Data Caricamento</th>
                                    <th style="width: 15%">Descrizione</th>
                                    <th style="width: 10%">Riferito a </th>
                                    <th style="width: 15%">Scarica</th>
                                    <th style="width: 10%">Mappa</th>
                                    <th style="width: 10%">Nome del file</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody id="table_ContentList">
                                <tr v-for="(photo, index) in photos" :key="photo.id">
                                    <td> @{{photo.date}} </td> 
                                    <td> @{{photo.description}}</td> 
                                    <td> @{{photo.reference}} </td> 
                                    <td><a :href="'../../storage/' + photo.image" download=""><ins>Download<i class="fa-solid fa-arrow-down"></i></ins></a></td> 
                                    <td class="text-decoration-underline"><a href="" class="text-light"><ins>Apri</ins></a></td> 
                                    <td>@{{photo.name}}</td> 
                                    <td><button @click="showImage(photo.image)" class="add-button">Vedi</button></td>
                                </tr>
                            </tbody>
                        </table>
                        @if (sizeof($photos) > 1)
                            <div class="d-flex justify-content-end py-3">
                                <a href="" class="btn bg-blue white">Scarica tutte le foto</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="px-20 py-5">
            <h5>Nessuna Foto caricata!</h5>
        </div>
    @endif

</div>