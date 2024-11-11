@include('partials.header')
<div class="container">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-600">
        <div class="flex items-center justify-center w-full">
            <form action="{{ route('admin.register') }}" method="POST"
                class="bg-white p-8 rounded-lg shadow-2xl w-96 transform hover:scale-105 transition-transform duration-300">
                @csrf
                <h2
                    class="text-3xl font-bold text-center mb-8 bg-gradient-to-r from-blue-500 to-purple-600 text-transparent bg-clip-text">
                    Register</h2>

                <div class="mb-6 relative">
                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="name" placeholder="Name" required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all duration-300">
                </div>

                <div class="mb-6 relative">
                    <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all duration-300">
                </div>

                <div class="mb-6 relative">
                    <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all duration-300">
                </div>

                <div class="mb-6 relative">
                    <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all duration-300">
                </div>

                <button type="submit"
                    class="w-full py-3 rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold hover:opacity-90 transform hover:scale-105 transition-all duration-300 hover:shadow-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>Register
                </button>
            </form>
        </div>
    </div>
</div>

@include('partials.footer')
