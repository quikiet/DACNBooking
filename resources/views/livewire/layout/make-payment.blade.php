<div>
    <form action="{{ route('vnpay') }}" method="post">
        @csrf
        <input type="hidden" name="vnpay" value="1">
        <button type="submit"
            class="py-2 mt-3 px-11 min-w-full me-2 mb-2 text-sm font-medium text-gray-100 focus:outline-none bg-green-400 rounded-lg border border-gray-200 hover:bg-green-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 ">
            Đặt phòng
        </button>
    </form>

</div>