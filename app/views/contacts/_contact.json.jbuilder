json.extract! contact, :id, :name, :corporation, :tel, :email, :category, :body, :created_at, :updated_at
json.url contact_url(contact, format: :json)
