<x-layout>
    <h1 class="display-1 text-center">Login</h1>
    <hr>

    <form method="post">

        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>
