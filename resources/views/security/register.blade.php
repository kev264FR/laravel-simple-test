<x-layout>

    <h1 class="display-1 text-center">Register</h1>
    <hr>


    <form method="post" class="mx-auto" style="max-width: 800px">

        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Repeat Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="cgu" name="cgu" required>
            <label class="form-check-label" for="cgu">CGU</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-layout>
