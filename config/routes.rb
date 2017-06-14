Rails.application.routes.draw do
  root 'services#index'
  get '/office', to: 'services#office'
  get '/wax', to: 'services#wax'
  get '/carpet', to: 'services#carpet'
  get '/house', to: 'services#house'
  get '/aircon', to: 'services#aircon'
  get '/apaman', to: 'services#apaman'

  get 'about', to: 'about#index'
  get 'privacy', to: 'privacy#index'
end
