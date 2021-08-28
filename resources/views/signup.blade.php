@extends('layout.main');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
        <form>
            <h3>Sign Up</h3>
            <div class="mb-3">
              <label for="F.name" class="form-label">Firstname</label>
              <input type="text" class="form-control" id="F.name" aria-describedby="firstname">
            </div>

            <div class="mb-3">
                <label for="L.name" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="L.name" aria-describedby="lastname">
              </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email">
              <div id="email" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Profile pic</label>
                <input type="file" class="form-control" id="exampleInputPassword1">
              </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>

        </div>
    </div>

</div>