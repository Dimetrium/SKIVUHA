set nocompatible              " be iMproved, required
filetype off                  " required

" set the runtime path to include Vundle and initialize
set rtp+=~/.vim/bundle/Vundle.vim
call vundle#begin()
" " alternatively, pass a path where Vundle should install plugins
" "call vundle#begin('~/some/path/here')

" let Vundle manage Vundle, required
Plugin 'gmarik/Vundle.vim'

" Plugin
Plugin 'tpope/vim-surround'
Plugin 'Valloric/MatchTagAlways'
Plugin 'mattn/emmet-vim'
"Plugin 'Lokaltog/vim-powerline'
Plugin 'bling/vim-airline'
Plugin 'scrooloose/syntastic'

" Color schemes
Plugin 'tomasr/molokai'
Plugin 'flazz/vim-colorschemes'

autocmd FileType php setlocal foldmethod=manual 
" All of your Plugins must be added before the following line
call vundle#end()            " required
filetype plugin indent on    " required
colorscheme MountainDew
set tabstop=2
set shiftwidth=2
set expandtab
set smarttab
set number
set showcmd
set showmatch
set hlsearch
set laststatus=2
" Search as you type.
set incsearch

" Ignore case when searching.
set ignorecase

set smartcase
set autoindent
set ruler
set background=dark
syntax on
set t_Co=256
autocmd FileType html set omnifunc=htmlcomplete#CompleteTags

" To save, press ctrl-s.
nmap <c-s> :w<CR>
imap <c-s> <Esc>:w<CR>a

" Use UTF-8.
set encoding=utf-8

"Show editing mode
set showmode
autocmd FileType php set omnifunc=phpcomplete#CompletePHP
if !exists('g:airlinesymbols')
let g:airlinesymbols = {}
endif

let g:syntastic_php_checkers = ['php', 'phpcs', 'phpmd']
set statusline+=%#warningmsg#
set statusline+=%{SyntasticStatuslineFlag()}
set statusline+=%*

let g:syntastic_always_populate_loc_list = 1
let g:syntastic_auto_loc_list = 1
let g:syntastic_check_on_open = 1
let g:syntastic_check_on_wq = 0
