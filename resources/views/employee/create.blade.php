@extends('employee.layout')

@section('title', 'Employees')

@section('page_header', 'Employee List')
@section('page_subtitle', 'Manage all employees from here.')

@section('content')
    <h2 class="text-lg font-medium text-gray-900 mb-4">Create Employee</h2>

    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" name="position" id="position" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" id="address" rows="3"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo" id="photo"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save
            </button>
        </div>
    </form>
@endsection

@push('styles')
    <style>
        /* পেজ-স্পেসিফিক CSS */
    </style>
@endpush

@push('scripts')
    <script>
        // পেজ-স্পেসিফিক JS
    </script>
@endpush
