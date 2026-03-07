<?php

use Livewire\Component;
use App\Models\Applicant;
use Illuminate\Support\Str;

new class extends Component
{
    public $full_name;
    public $nisn;
    public $gender = 'L';
    public $birth_place;
    public $birth_date;
    public $origin_school;
    public $parent_name;
    public $phone;
    public $address;

    public $success = false;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'nisn' => 'nullable|numeric|digits:10',
        'gender' => 'required|in:L,P',
        'birth_place' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'origin_school' => 'required|string|max:255',
        'parent_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string',
    ];

    public function save()
    {
        $this->validate();

        $registration_number = 'PPDB-' . date('Y') . '-' . strtoupper(Str::random(6));

        Applicant::create([
            'registration_number' => $registration_number,
            'full_name' => $this->full_name,
            'nisn' => $this->nisn,
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'origin_school' => $this->origin_school,
            'parent_name' => $this->parent_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'status' => 'pending',
        ]);

        $this->success = true;
        $this->reset(['full_name', 'nisn', 'gender', 'birth_place', 'birth_date', 'origin_school', 'parent_name', 'phone', 'address']);
    }
};
?>

<div>
    @if($success)
        <div class="bg-primary/10 border border-primary text-primary p-6 rounded-2xl text-center">
            <div class="text-4xl mb-4 text-primary">✅</div>
            <h4 class="text-xl font-bold mb-2">Pendaftaran Berhasil!</h4>
            <p class="text-sm font-medium">Terima kasih telah mendaftar. Data Anda akan kami verifikasi segera. Silakan tunggu informasi lebih lanjut melalui nomor WhatsApp yang telah Anda daftarkan.</p>
            <button wire:click="$set('success', false)" class="mt-6 text-xs underline font-bold uppercase tracking-widest">Isi Formulir Baru</button>
        </div>
    @else
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">Nama Lengkap</label>
                    <input type="text" wire:model="full_name" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium" placeholder="Nama sesuai ijazah">
                    @error('full_name') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">NISN</label>
                    <input type="text" wire:model="nisn" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium" placeholder="10 digit NISN">
                    @error('nisn') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">Jenis Kelamin</label>
                    <select wire:model="gender" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">Tempat Lahir</label>
                    <input type="text" wire:model="birth_place" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium">
                    @error('birth_place') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">Tanggal Lahir</label>
                    <input type="date" wire:model="birth_date" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium">
                    @error('birth_date') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">Sekolah Asal (MTs/SMP)</label>
                    <input type="text" wire:model="origin_school" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium">
                    @error('origin_school') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-neutral uppercase mb-2">Nama Orang Tua / Wali</label>
                    <input type="text" wire:model="parent_name" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium">
                    @error('parent_name') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-neutral uppercase mb-2">Nomor WhatsApp Aktif</label>
                <input type="tel" wire:model="phone" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium" placeholder="08xxxxxxxxxx">
                @error('phone') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-neutral uppercase mb-2">Alamat Lengkap</label>
                <textarea wire:model="address" rows="3" class="w-full bg-light border border-border p-3 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-sm font-medium"></textarea>
                @error('address') <span class="text-rose-500 text-[10px] font-bold">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-primary text-white py-4 rounded-xl font-bold uppercase tracking-[0.2em] shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all">Submit Pendaftaran</button>
        </form>
    @endif
</div>