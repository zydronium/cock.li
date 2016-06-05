# config valid only for current version of Capistrano
lock '3.5.0'

set :application, 'cock.li'
set :repo_url, 'git.cock.li:cock.li.git'

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, "/var/www/#{fetch(:application)}/cap"

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('.env','storage/laravel.log')

# Default value for linked_dirs is []
# set :linked_dirs, fetch(:linked_dirs, []).push('log', 'tmp/pids', 'tmp/cache', 'tmp/sockets', 'vendor/bundle', 'public/system')
set :linked_dirs, fetch(:linked_dirs, []).push('public/transparency','public/donations','storage/app','storage/logs','storage/framework','public/.well-known')

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

namespace :deploy do

  after :updated, :composer do
    on roles(:web) do
      within release_path do
        execute :composer, :install
      end
    end
  end

  after :updated, :db_backup do
    on roles(:web) do
      within release_path do
        execute :mysqldump, :mail, "-r ~/mail.sql"
      end
    end
  end

  after :db_backup, :migrate do
    on roles(:web) do
      within release_path do
        execute :php, :artisan, :migrate, "--force"
      end
    end
  end

end
