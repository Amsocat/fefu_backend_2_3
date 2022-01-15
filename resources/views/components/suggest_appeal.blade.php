<script type="text/javascript">
    let isAccepted = confirm("Не хотите отправить отзыв?");
    if (isAccepted) {
        let url = new URL("{{ route("appeal") }}");
        url.searchParams.append("suggested", "1");
        window.location.href = url;
    }
</script>
