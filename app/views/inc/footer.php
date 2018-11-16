  </div>

  <script>
      $('#summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']], 
        ]

      });

      document.getElementById('exampleCheck1').addEventListener("change", validaCheckbox, false);
            document.getElementById('img').disabled = true;
            document.getElementById('cap').disabled = true;
            document.getElementById('lnk').disabled = true;
      function validaCheckbox() {
          var checked = document.getElementById('exampleCheck1').checked;

          if(!checked) {

            document.getElementById('img').disabled = true;
            document.getElementById('cap').disabled = true;
            document.getElementById('lnk').disabled = true;
          } else {
            document.getElementById('img').disabled = false;
            document.getElementById('cap').disabled = false;
            document.getElementById('lnk').disabled = false;
          }
      }
  </script>  
  
</body>
</html>