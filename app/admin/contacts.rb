ActiveAdmin.register Contact do
  permit_params :name, :corporation, :tel, :email, :body
  actions :all, except: [:new, :create, :edit, :update, :destroy]

  index title: I18n.t('activerecord.models.contact') + '一覧' do
    column I18n.t('activerecord.attributes.contact.id'), :id
    column I18n.t('activerecord.attributes.contact.name'), :name
    column I18n.t('activerecord.attributes.contact.corporation'), :corporation
    column I18n.t('activerecord.attributes.contact.tel'), :tel
    column I18n.t('activerecord.attributes.contact.email'), :email
    column I18n.t('activerecord.models.contact_category') do |contact|
      Category.where(id: ContactCategory.where(contact_id: contact.id).pluck(:category_id)).pluck(:name).join(', ')
    end
    column I18n.t('activerecord.attributes.contact.body'), :body
    column I18n.t('activerecord.attributes.contact.created_at'), :created_at
    column I18n.t('activerecord.attributes.contact.updated_at'), :updated_at
    actions
  end

  show do
    attributes_table do
      row I18n.t('activerecord.attributes.contact.id') do
        resource.id
      end
      row I18n.t('activerecord.attributes.contact.name') do
        resource.name
      end
      row I18n.t('activerecord.attributes.contact.corporation') do
        resource.corporation
      end
      row I18n.t('activerecord.attributes.contact.tel') do
        resource.tel
      end
      row I18n.t('activerecord.attributes.contact.email') do
        resource.email
      end
      row I18n.t('activerecord.models.contact_category') do
        Category.where(id: ContactCategory.where(contact_id: resource.id).pluck(:category_id)).pluck(:name).join(', ')
      end
      row I18n.t('activerecord.attributes.contact.body') do
        resource.body
      end
      row I18n.t('activerecord.attributes.contact.created_at') do
        resource.created_at
      end
      row I18n.t('activerecord.attributes.contact.updated_at') do
        resource.updated_at
      end
    end
  end
end
