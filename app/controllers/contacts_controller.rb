class ContactsController < ApplicationController
  before_action :set_categories

  # GET /contacts
  def new
    @contact = Contact.new
  end

  # POST /contacts
  def create
    @contact = Contact.new(contact_params)

    if params[:back]
      render :new
    elsif @contact.valid? && params[:confirm]
      render :confirm
    elsif @contact.save
      redirect_to action: 'thanks'
    else
      render :new
    end
  end

  # GET /contacts/thanks
  def thanks
  end

  private
    # Never trust parameters from the scary internet, only allow the white list through.
    def contact_params
      params.require(:contact).permit(:name, :corporation, :tel, :email, {:category_ids => []}, :body)
    end

    def set_categories
      @categories = [
          'オフィス清掃',
          '定期清掃（ＷＡＸ・カーペット等）',
          'マンション・アパート等の清掃',
          'エアコンクリーニング',
          '高所ガラス清掃',
          '医療関係',
          '老人介護施設',
          'その他'
      ]
    end
end
