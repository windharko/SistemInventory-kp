<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form>
            <div class="col-md-12" id="label-name">
              <label for="name">Nama Barang </label>
            </div>
            <div class="col-md-12" id="qrform">
              <input value="{{$data->name}}" class="form-control" autofocus>
            </div>
            <button type="button" class="btn btn-primary" id="addButton">Save changes</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
           <script>
            $('#addButton').click(function(){
              console.log('sukses');
            });

        function submitForm() {
            // Get form data
            const name = document.getElementById('inputName').value;
            // Do any necessary validation here
            if (!name || !email) {
                alert('Please fill in all fields.');
                return;
            }

            // Process the form data (e.g., send it to the server)
            // ...

            // Close the modal
            $('#exampleModalCenter').modal('hide');
        }
        function submitForm() {
            // Get form data
            const name = document.getElementById('inputName').value;
            const email = document.getElementById('inputEmail').value;

            // Do any necessary validation here
            if (!name || !email) {
                alert('Please fill in all fields.');
                return;
            }

            // Save the input values to variables or use them in the main page
            const mainPageNameElement = document.getElementById('mainPageName');
            const mainPageEmailElement = document.getElementById('mainPageEmail');

            mainPageNameElement.textContent = name;
            mainPageEmailElement.textContent = email;

            // Close the modal
            $('#exampleModalCenter').modal('hide');
        }
    </script>