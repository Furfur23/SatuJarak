@extends('layouts.app')

@section('title', 'Lihat Dokumen')
@section('topbar_title', 'ADMIN · LIHAT DOKUMEN')
@section('active_menu', 'pengajuan')

@push('styles')
    <style>
        /* ---------- Heading ---------- */
        .heading-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .heading-label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.2px;
            color: var(--mint);
            margin-bottom: 4px;
        }

        .heading-row .page-sub {
            margin-bottom: 0;
        }

        /* ---------- Summary strip ---------- */
        .doc-summary {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--mint-soft) 0%, var(--mint-mid) 100%);
            border-radius: var(--radius-lg);
            padding: 22px 28px;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
        }

        .doc-summary::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(108, 199, 160, 0.35);
            right: -60px;
            top: -90px;
            pointer-events: none;
        }

        .doc-summary>* {
            position: relative;
            z-index: 1;
        }

        .summary-left {
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 0;
        }

        .summary-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: #fff;
            color: var(--pink-text);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
            box-shadow: 0 8px 18px rgba(11, 59, 44, 0.08);
        }

        .summary-code {
            font-size: 12px;
            font-weight: 800;
            color: #3FA57B;
            letter-spacing: 1.2px;
        }

        .summary-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--forest);
            line-height: 1.3;
            word-break: break-word;
        }

        .summary-meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 255, 255, 0.85);
            color: var(--forest);
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 12.5px;
            font-weight: 700;
        }

        .meta-chip i {
            color: #2D9B6A;
        }

        /* ---------- Viewer shell ---------- */
        .viewer-shell {
            display: grid;
            grid-template-columns: 290px minmax(0, 1fr);
            gap: 22px;
            align-items: stretch;
        }

        .viewer-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* ---------- Document list ---------- */
        .doc-panel {
            padding: 22px 20px;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .panel-icon {
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: var(--mint-soft);
            color: #2D9B6A;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .panel-heading h3 {
            font-size: 16px;
            font-weight: 800;
            color: var(--forest);
        }

        .panel-heading p {
            margin: 0;
            font-size: 12.5px;
            color: var(--muted);
        }

        .doc-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
            overflow-y: auto;
        }

        .doc-tab {
            width: 100%;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--border);
            background: #F8FAF9;
            transition: all 0.2s ease;
        }

        .doc-tab:hover {
            border-color: var(--mint);
            background: var(--mint-soft);
            transform: translateX(3px);
        }

        .doc-tab.active {
            background: var(--forest);
            border-color: var(--forest);
            box-shadow: 0 10px 22px rgba(11, 56, 40, 0.18);
        }

        .doc-tab-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--pink-light);
            color: var(--pink-text);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .doc-tab-icon.image {
            background: var(--gold-light);
            color: var(--peach-text);
        }

        .doc-tab.active .doc-tab-icon {
            background: var(--gold);
            color: var(--forest);
        }

        .doc-tab-info {
            min-width: 0;
            flex: 1;
        }

        .doc-tab-info strong {
            display: block;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .doc-tab-info span {
            font-size: 12px;
            color: var(--muted);
        }

        .doc-tab.active .doc-tab-info strong {
            color: #fff;
        }

        .doc-tab.active .doc-tab-info span {
            color: #D4E7DF;
        }

        .doc-tab-check {
            color: var(--mint);
            font-size: 16px;
            display: none;
        }

        .doc-tab.active .doc-tab-check {
            display: block;
        }

        .panel-note {
            margin-top: 16px;
            padding: 12px 14px;
            border-radius: var(--radius-sm);
            background: var(--gold-light);
            color: var(--peach-text);
            font-size: 12.5px;
            font-weight: 600;
            display: flex;
            gap: 9px;
            align-items: flex-start;
        }

        /* ---------- Viewer toolbar ---------- */
        .viewer-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            background: #FCFDFC;
            flex-wrap: wrap;
        }

        .toolbar-title {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .toolbar-title i {
            font-size: 20px;
            color: var(--pink-text);
        }

        .toolbar-title strong {
            font-size: 14.5px;
            font-weight: 800;
            color: var(--forest);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .toolbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tool-btn {
            height: 40px;
            min-width: 40px;
            padding: 0 14px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--forest);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 13.5px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .tool-btn:hover {
            background: var(--mint-soft);
            color: var(--forest);
            transform: translateY(-2px);
        }

        .tool-btn.solid {
            background: var(--gold);
            border-color: var(--gold);
        }

        .tool-btn.solid:hover {
            background: var(--gold);
            box-shadow: 0 8px 18px rgba(217, 163, 106, 0.28);
        }

        .tool-divider {
            width: 1px;
            height: 24px;
            background: var(--border);
            margin: 0 4px;
        }

        /* ---------- Frame ---------- */
        .viewer-stage {
            position: relative;
            flex: 1;
            min-height: 640px;
            height: calc(100vh - 330px);
            background:
                radial-gradient(circle at 20% 15%, rgba(112, 198, 155, 0.14), transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(217, 163, 106, 0.14), transparent 40%),
                #EEF4F0;
            padding: 16px;
        }

        .viewer-stage iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: var(--radius-md);
            background: #fff;
            box-shadow: 0 6px 22px rgba(11, 59, 44, 0.12);
            position: relative;
            z-index: 2;
        }

        /* Placeholder behind the iframe: visible when the file fails to load */
        .viewer-fallback {
            position: absolute;
            inset: 16px;
            z-index: 1;
            border-radius: var(--radius-md);
            border: 1.5px dashed var(--sage);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--muted);
            font-size: 13.5px;
            text-align: center;
            padding: 20px;
        }

        .viewer-fallback i {
            font-size: 44px;
            color: var(--gold);
        }

        /* ---------- Fullscreen ---------- */
        .viewer-card:fullscreen {
            border-radius: 0;
            border: none;
        }

        .viewer-card:fullscreen .viewer-stage {
            height: auto;
        }

        /* ---------- Footer actions ---------- */
        .viewer-footer {
            padding: 14px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            background: #FCFDFC;
        }

        .footer-hint {
            font-size: 12.5px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-hint i {
            color: var(--mint);
        }

        .footer-nav {
            display: flex;
            gap: 8px;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 1200px) {
            .viewer-shell {
                grid-template-columns: 1fr;
            }

            .doc-panel {
                padding: 18px;
            }

            .doc-list {
                flex-direction: row;
                overflow-x: auto;
                overflow-y: hidden;
                padding-bottom: 6px;
            }

            .doc-tab {
                min-width: 240px;
                width: auto;
            }

            .doc-tab:hover {
                transform: none;
            }

            .panel-note {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .doc-summary {
                padding: 18px;
            }

            .summary-title {
                font-size: 17px;
            }

            .viewer-stage {
                min-height: 520px;
                height: 70vh;
                padding: 8px;
            }

            .viewer-fallback {
                inset: 8px;
            }

            .viewer-toolbar {
                padding: 12px 14px;
            }

            .tool-btn span {
                display: none;
            }

            .tool-btn {
                padding: 0;
                width: 40px;
            }

            .viewer-footer {
                padding: 12px 14px;
            }

            .footer-hint {
                display: none;
            }

            .footer-nav {
                width: 100%;
            }

            .footer-nav .btn-outline-soft,
            .footer-nav .btn-primary-green {
                flex: 1;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Heading -->
    <div class="heading-row">
        <div>
            <span class="heading-label">ADMINISTRASI DESA</span>
            <h1 class="page-heading">Lihat Dokumen</h1>
            <p class="page-sub">Periksa dokumen persyaratan yang dilampirkan pemohon sebelum memverifikasi</p>
        </div>

        <a href="{{ route('adminDetailPengajuan') }}" class="btn-outline-soft">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <!-- Summary -->
    <div class="doc-summary">
        <div class="summary-left">
            <div class="summary-icon">
                <i class="bi bi-file-earmark-pdf-fill"></i>
            </div>
            <div>
                <div class="summary-code">PGJ-001</div>
                <div class="summary-title">Pengajuan Kerjasama KKN</div>
            </div>
        </div>

        <div class="summary-meta">
            <span class="meta-chip"><i class="bi bi-person-fill"></i> Ahmad Fauzi</span>
            <span class="meta-chip"><i class="bi bi-calendar-event-fill"></i> 25 September 2026</span>
            <span class="meta-chip"><i class="bi bi-folder-fill"></i> 3 Dokumen</span>
        </div>
    </div>

    <!-- Viewer -->
    <div class="viewer-shell">

        <!-- Document list -->
        <aside class="viewer-card doc-panel">
            <div class="panel-heading">
                <div class="panel-icon">
                    <i class="bi bi-folder2-open"></i>
                </div>
                <div>
                    <h3>Daftar Dokumen</h3>
                    <p>Pilih dokumen untuk ditampilkan</p>
                </div>
            </div>

            <div class="doc-list">

                <button type="button" class="doc-tab active"
                    data-src="{{ asset('documents/surat-pengantar-kkn.pdf') }}"
                    data-name="Surat Pengantar KKN.pdf" data-type="pdf">
                    <div class="doc-tab-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                    <div class="doc-tab-info">
                        <strong>Surat Pengantar KKN.pdf</strong>
                        <span>1.2 MB · PDF</span>
                    </div>
                    <i class="bi bi-check-circle-fill doc-tab-check"></i>
                </button>

                <button type="button" class="doc-tab"
                    data-src="{{ asset('documents/proposal-kkn.pdf') }}"
                    data-name="Proposal KKN.pdf" data-type="pdf">
                    <div class="doc-tab-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                    <div class="doc-tab-info">
                        <strong>Proposal KKN.pdf</strong>
                        <span>2.8 MB · PDF</span>
                    </div>
                    <i class="bi bi-check-circle-fill doc-tab-check"></i>
                </button>

                <button type="button" class="doc-tab"
                    data-src="{{ asset('documents/surat-pernyataan.jpg') }}"
                    data-name="Surat Pernyataan.jpg" data-type="image">
                    <div class="doc-tab-icon image"><i class="bi bi-file-earmark-image-fill"></i></div>
                    <div class="doc-tab-info">
                        <strong>Surat Pernyataan.jpg</strong>
                        <span>850 KB · JPG</span>
                    </div>
                    <i class="bi bi-check-circle-fill doc-tab-check"></i>
                </button>

            </div>

            <div class="panel-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>Pastikan seluruh dokumen sudah diperiksa sebelum melakukan verifikasi.</span>
            </div>
        </aside>

        <!-- Frame -->
        <section class="viewer-card" id="viewerCard">

            <div class="viewer-toolbar">
                <div class="toolbar-title">
                    <i class="bi bi-file-earmark-pdf-fill" id="viewerIcon"></i>
                    <strong id="viewerName">Surat Pengantar KKN.pdf</strong>
                </div>

                <div class="toolbar-actions">
                    <a href="{{ asset('documents/surat-pengantar-kkn.pdf') }}" target="_blank" rel="noopener"
                        class="tool-btn" id="openNewTab" title="Buka di tab baru">
                        <i class="bi bi-box-arrow-up-right"></i>
                        <span>Tab Baru</span>
                    </a>

                    <a href="{{ asset('documents/surat-pengantar-kkn.pdf') }}" download
                        class="tool-btn solid" id="downloadBtn" title="Unduh dokumen">
                        <i class="bi bi-download"></i>
                        <span>Unduh</span>
                    </a>

                    <div class="tool-divider"></div>

                    <button type="button" class="tool-btn" id="fullscreenBtn" title="Layar penuh">
                        <i class="bi bi-arrows-fullscreen" id="fullscreenIcon"></i>
                    </button>
                </div>
            </div>

            <div class="viewer-stage">
                <div class="viewer-fallback">
                    <i class="bi bi-file-earmark-x"></i>
                    <strong>Dokumen tidak dapat ditampilkan</strong>
                    <span>Gunakan tombol “Tab Baru” atau “Unduh” untuk membuka dokumen.</span>
                </div>

                <iframe id="docFrame" src="{{ asset('documents/surat-pengantar-kkn.pdf') }}#toolbar=1&navpanes=0&view=FitH"
                    title="Pratinjau dokumen"></iframe>
            </div>

            <div class="viewer-footer">
                <div class="footer-hint">
                    <i class="bi bi-shield-check"></i>
                    Dokumen hanya dapat dilihat oleh admin desa
                </div>

                <div class="footer-nav">
                    <button type="button" class="btn-outline-soft" id="prevDoc">
                        <i class="bi bi-chevron-left"></i>
                        Sebelumnya
                    </button>

                    <button type="button" class="btn-primary-green" id="nextDoc">
                        Selanjutnya
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

        </section>

    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = Array.from(document.querySelectorAll('.doc-tab'));
            const frame = document.getElementById('docFrame');
            const nameEl = document.getElementById('viewerName');
            const iconEl = document.getElementById('viewerIcon');
            const openBtn = document.getElementById('openNewTab');
            const downloadBtn = document.getElementById('downloadBtn');
            const card = document.getElementById('viewerCard');
            const fsBtn = document.getElementById('fullscreenBtn');
            const fsIcon = document.getElementById('fullscreenIcon');
            const prevBtn = document.getElementById('prevDoc');
            const nextBtn = document.getElementById('nextDoc');
            let current = 0;

            function show(index) {
                current = index;
                const tab = tabs[index];
                const src = tab.dataset.src;
                const isPdf = tab.dataset.type === 'pdf';

                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                frame.src = isPdf ? src + '#toolbar=1&navpanes=0&view=FitH' : src;
                nameEl.textContent = tab.dataset.name;
                iconEl.className = isPdf
                    ? 'bi bi-file-earmark-pdf-fill'
                    : 'bi bi-file-earmark-image-fill';
                iconEl.style.color = isPdf ? '' : 'var(--peach-text)';
                openBtn.href = src;
                downloadBtn.href = src;

                prevBtn.disabled = index === 0;
                nextBtn.disabled = index === tabs.length - 1;
                prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
                nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
            }

            tabs.forEach((tab, i) => tab.addEventListener('click', () => show(i)));
            prevBtn.addEventListener('click', () => current > 0 && show(current - 1));
            nextBtn.addEventListener('click', () => current < tabs.length - 1 && show(current + 1));

            fsBtn.addEventListener('click', () => {
                if (document.fullscreenElement) {
                    document.exitFullscreen();
                } else if (card.requestFullscreen) {
                    card.requestFullscreen();
                }
            });

            document.addEventListener('fullscreenchange', () => {
                fsIcon.className = document.fullscreenElement
                    ? 'bi bi-fullscreen-exit'
                    : 'bi bi-arrows-fullscreen';
            });

            show(0);
        });
    </script>
@endpush