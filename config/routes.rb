Rails.application.routes.draw do
  devise_for :admin_users, ActiveAdmin::Devise.config
  ActiveAdmin.routes(self)
  resources :contact_categories
  resources :categories
  root 'services#index'
  get 'office', to: 'services#office'
  get 'wax', to: 'services#wax'
  get 'carpet', to: 'services#carpet'
  get 'house', to: 'services#house'
  get 'aircon', to: 'services#aircon'
  get 'apaman', to: 'services#apaman'

  get 'about', to: 'about#index'
  get 'privacy', to: 'privacy#index'

  #resources :contacts
  get 'contacts', to: 'contacts#new'
  post 'contacts', to: 'contacts#create'
  get 'contacts/thanks', to: 'contacts#thanks'

  #news
  get 'news', to: 'news#index'
  get 'news/:id', to: 'news#show', as: 'article'
end
