{{-- modal --}}
<div class="opacity" v-if="isModalVisible">
    <div class="modal-box py-3 px-5 d-flex flex-column align-items-center justify-content-around text-center">
        <div>
            <h3>Attenzione!</h3>
        </div>
        <div>
            <p>Per salvare la pratica è necessario inserire il ruolo del richiedente</p>
        </div>
        <div>
            <a class="add-button px-5 py-1 clickable" @click="closeModal()">Ok</a>
        </div>
    </div>  
</div>