@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table_ContentList tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function() {

            $('.checkall').click(function() {
                $(":checkbox").attr("checked", true);
            });

            $('.uncheckall').click(function() {
                $(":checkbox").attr("checked", false);
            });
        });
    </script>
@endpush
