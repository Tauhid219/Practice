@extends('employee.layout')

@section('title', 'Employees')

@section('page_header', 'Employee List')
@section('page_subtitle', 'Manage all employees from here.')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">মোট কর্মচারী: {{ $employees->count() }}</h2>
        <a href="{{ route('employees.create') }}"
            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            নতুন কর্মচারী যোগ করুন
        </a>
    </div>


    <div class="overflow-x-auto bg-white rounded-xl border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">নাম</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ইমেইল</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ডিপার্টমেন্ট
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">যোগদানের
                        তারিখ</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">অ্যাকশন</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($employees as $employee)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $employee->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $employee->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $employee->department->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $employee->join_date->format('d M, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">দেখুন</a>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="text-green-600 hover:text-green-900">সম্পাদনা</a>
                                <form method="POST" action="{{ route('employees.destroy', $employee->id) }}"
                                    onsubmit="return confirm('আপনি কি নিশ্চিত?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">মুছুন</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">কোনও কর্মচারী পাওয়া যায়নি।</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    {{-- Pagination --}}
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
@endsection
