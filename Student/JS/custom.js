$(document).ready(function () {
  $(function () {
    $("#playlist li").on("click", function () {
      $("#videoPlayer").attr({
        src: $(this).attr("movieurl"),
      });
    });
    $("#videoPlayer").attr({
      src: $("#playlist li").eq(0).attr("movieurl"),
    });
  });
});
