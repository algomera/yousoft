<div class="modal fade" id="anagrafiche-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dati Anagrafica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Tipo soggetto</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="subject_type" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Ragione sociale</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="company_name" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Indirizzo</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="address" value="">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">CAP</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="zip" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Città</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="city" value="">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Prov.</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="province" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">IBAN</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="iban" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">P.IVA</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="vat" value="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Cod. Fiscale</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="fiscal_code" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Telefono</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="phone" value="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Fax</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="fax" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">E-mail</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="email" value="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">E-mail P.E.C.</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="email_pec" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Data di nascita</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="date_of_birth" value="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Comune</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="common_of_birth" value="">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="mb-1">Prov.</label>
                            <input type="text" readonly disabled class="form-control form-control-sm" id="province_of_birth" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.viewAnagrafica', function(e){
                e.preventDefault();
                let id = $(this).data('id');
                axios.get(`/anagrafiche/${id}/view`)
                    .then((res) => {
                        $('#subject_type').val('');
                        $('#subject_type').val(res.data.subject_type);
                        $('#company_name').val('');
                        $('#company_name').val(res.data.company_name);
                        $('#address').val('');
                        $('#address').val(res.data.address);
                        $('#zip').val('');
                        $('#zip').val(res.data.zip);
                        $('#city').val('');
                        $('#city').val(res.data.city);
                        $('#province').val('');
                        $('#province').val(res.data.province);
                        $('#iban').val('');
                        $('#iban').val(res.data.iban);
                        $('#vat').val('');
                        $('#vat').val(res.data.vat);
                        $('#fiscal_code').val('');
                        $('#fiscal_code').val(res.data.fiscal_code);
                        $('#phone').val('');
                        $('#phone').val(res.data.phone);
                        $('#fax').val('');
                        $('#fax').val(res.data.fax);
                        $('#email').val('');
                        $('#email').val(res.data.email);
                        $('#email_pec').val('');
                        $('#email_pec').val(res.data.email_pec);
                        $('#date_of_birth').val('');
                        $('#date_of_birth').val(res.data.date_of_birth);
                        $('#common_of_birth').val('');
                        $('#common_of_birth').val(res.data.common_of_birth);
                        $('#province_of_birth').val('');
                        $('#province_of_birth').val(res.data.province_of_birth);
                    })
            });

        });

    </script>
@endpush
